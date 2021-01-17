<?php

namespace App\Http\Controllers;

use App\Customer;
use App\MonthlyBill;
use App\MonthlyInvoice;
use App\Package;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Editor\Fields\Number;

class BillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('billing.index');

    }

    public function getBillings()
    {
        $users = Customer::where('status', 'Active')->with('monthly_bill')->with('billing')->get();
        $data = collect();
        foreach ($users as $user) {
            $bill = $user->monthly_bill()->orderBy('created_at', 'desc')->firstOrFail();
            $data->push([
                'id' => $user->reference_no,
                'full_name' => $user->full_name,
                'monthly_bill' => $user->billing->monthly_bill,
                'mikrotik' => $user->mikrotik->identity,
                'package' => Package::find($user->package_id)->name,
                'total_paid' => $bill->paid_amount,
                'advance' => $bill->advance_paid,
                'pending_amount' => $bill->pending_amount,
                'due_date' => $bill->due_date,
                'last_payment_date' => $bill->payment_date,
            ]);
        }
        $d = Datatables::of($data)
            ->addColumn('connection', function ($user) {
                return '<input type="checkbox" class="js-switch" data-color="#26c6da" data-secondary-color="#f62d51" />
                            <input id="userId" value="' . $user['id'] . '" hidden>';
            })
            ->editColumn('due_date', function ($user) {
                return
                    '<span>' . $user['due_date'] . '</span>
                    <div class="input-group mb-3">
                    <input type="date" class="form-control" id="dueDate" aria-label="" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                    <button class="btn btn-outline-info btn-sm" type="button" onclick="changeDueDate()"><i class="fas fa-recycle"></i></button>
                    </div>
                    <input id="dueDateUser" value="' . $user['id'] . '" hidden>
                    </div>';
            })
            ->addColumn('actions', function ($user) {
                    $a = '<a class="btn btn-outline-primary btn-sm" href="' . url('/billing/edit/') . '/' . $user['id'] . '"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-outline-primary btn-sm" href="' . url('/invoice/') . '/' . $user['id'] . '/stream"><i class="fas fa-receipt"></i>Invoice</a>';
                    if ($user['pending_amount'] <= 0) {
                           $b =  '<a class="btn btn-success btn-sm" href="#"><i class="fas fa-dollar-sign mr-2"></i>Paid</a>';
                    } else {
                        $b = '<a class="btn btn-outline-primary btn-sm" href="' . url("/billing/pay/") . '/' . $user['id'] . '"><i class="fas fa-dollar-sign mr-2"></i>Pay</a>';
                    }
                    return $a . $b;
            })
            ->rawColumns(['actions', 'status', 'due_date', 'connection'])
            ->make();
        ob_clean();
        return $d;
    }

    public function payBill($id)
    {
        $user = Customer::find($id)->with('billing')->firstOrFail();
        return view('billing.payment')
            ->with('user', $user);
    }

    public function changeDueDate(Request $request)
    {
        ob_clean();
        $user = Customer::find($request->user)->with('monthly_bill')->firstOrFail();
        $bill = $user->monthly_bill()->orderBy('created_at', 'desc')->firstOrFail();
        $bill->due_date = Carbon::parse($request->date);
        $bill->save();
    }

    public function receiveBill(Request $request)
    {
        $customer = Customer::find($request->customer_id)->with('monthly_bill')->firstOrFail();
        $bill = $customer->monthly_bill()->orderBy('created_at', 'desc')->firstOrFail();
        $bill->pending_amount = $request->dueBalance;
        $bill->paid_amount = $request->received;
        ($request->dueBalance < $request->received) ? $bill->advance_paid = $request->received - $request->dueBalance : '';
        $bill->payment_date = Carbon::parse($request->date);
        $bill->save();
        return view('billing.index');
    }

    public function invoice($id, $type)
    {
        $user = Customer::find($id)->with('monthly_bill')->firstOrFail();
        $bill = $user->monthly_bill()->orderBy('created_at', 'desc')->firstOrFail();
//        $pdf = PDF::loadView('billing.invoice-template', ['user' => $user, 'bill'=>$bill])->setOptions(['defaultFont' => 'sans-serif']);
//        if ($type == 'stream') {
//            return $pdf->stream('invoice.pdf');
//        }
//        if ($type == 'download') {
//            return $pdf->download('invoice.pdf');
//        }

        return view('billing.invoice-template')->with([
                'user' => $user,
                'bill' => $bill
            ]
        );
//        return $this->generate_invoice([
//            'id' => $user->reference_no,
//            'full_name' => $user->full_name,
//            'address' => $user->pres_addr,
//            'monthly_bill' => $user->billing->monthly_bill,
//            'discount' => $user->billing->perm_discount,
//            'package' => Package::find($user->package_id)->name,
//            'total_paid' => $bill->paid_amount,
//            'pending_amount' => $bill->pending_amount,
//            'due_date' => $bill->due_date,
//            'last_payment_date' => $bill->payment_date,
//        ]);

    }

    public function generate_invoice($data)
    {
        $customer = Invoice::makeParty([
            'name' => $data['full_name'],
            'address' => $data['address'],
            'Package' => $data['package'],
            'custom_fields' => [
                'Reference Number' => $data['id'],
            ],
        ]);
        $isp = Invoice::makeParty([
            'name' => 'SmartISP',
            'address' => 'Bangladesh',
            'Tas Number' => '1234',
            'custom_fields' => [
                'Location' => 'here and there',
            ],
        ]);
        $item = Invoice::makeItem($data['package'])->pricePerUnit($data['monthly_bill'])->discount($data['discount']);
        return Invoice::make()->buyer($customer)->seller($isp)->addItem($item)->stream();
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $user = Customer::find($id)->with('monthly_bill')->firstOrFail();
        $bill = $user->monthly_bill()->orderBy('created_at', 'desc')->firstOrFail();
        return view('billing.edit')
            ->with('user', $user)
            ->with('bill', $bill);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
