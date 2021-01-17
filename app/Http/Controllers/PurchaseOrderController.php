<?php

namespace App\Http\Controllers;

use App\Account;
use App\Journal;
use App\Product;
use App\ProductBrand;
use App\ProductVendor;
use App\PurchaseOrder;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;


class PurchaseOrderController extends Controller
{

    public function index()
    {
        return view('inventory.purchase_order.index');
    }


    public function create()
    {
        return view('inventory.purchase_order.create',
            [
                'products' => Product::all(),
                'brands' => ProductBrand::all(),
                'vendors' => ProductVendor::all(),
                'users' => User::all(),
                'accounts' => Account::all(),
            ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'product' => 'required',
            'brand' => 'required',
            'vendor' => 'required',
            'purchaser' => 'required',
            'date' => 'required',
            'lifetime' => 'required',
            'warranty' => 'required',
            'c_account' => 'required',
            'd_account' => 'required',
            'paid' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',
        ]);
        if ($data['c_account'] === $data['d_account']) {
            Toastr::fail('Credit and Debit account cannot be same', 'Failed');
            return redirect(route('purchase.create'));
        }
        try {
            $id = DB::table('journals')
                ->orderBy('journal_number', 'desc')
                ->first()
                ->journal_number;
            $id++;
        } catch (\Exception $e) {
            $id = 1;
        }

        Journal::create([
            'journal_number' => $id,
            'account_id' => $data['c_account'],
            'type' => 'c',
            'amount' => $data['paid'],
            'date' => $data['date'],
            'notes' => 'Added By Purchase Order',
        ]);
        Journal::create([
            'journal_number' => $id,
            'account_id' => $data['c_account'],
            'type' => 'd',
            'amount' => $data['paid'],
            'date' => $data['date'],
            'notes' => 'Added By Purchase Order',
        ]);
        try {
            $purchaseOrder = PurchaseOrder::create([
                'purchase_date' => $data['date'],
                'lifetime' => $data['lifetime'],
                'warranty' => $data['warranty'],
                'paid' => $data['paid'],
                'quantity' => $data['quantity'],
                'price_per_piece' => $data['price'],
                'user_id' => $data['purchaser'],
                'total' => $data['total'],
                'products_id' => $data['product'],
                'product_brands_id' => $data['brand'],
                'product_vendors_id' => $data['vendor'],
                'journal_entry' => $id,
            ]);
            $product = Product::findOrFail($data['product']);
            $product->quantity += $data['quantity'];
            $product->purchase_amount += $data['total'];
            $product->save();
            Toastr::success('New Purchase Order Succesfull', 'Success');
            return redirect(route('purchase.index'));
        } catch (Exception $e) {
            Toastr::fail('An Error Occured:' . $e->getMessage(), 'Failed');
        }

    }

    public function getpurchase(Request $request)
    {
        $purchases = PurchaseOrder::select([
            'id', 'products_id', 'product_brands_id', 'product_vendors_id', 'quantity', 'warranty', 'total', 'purchase_date'
        ]);
        $d = Datatables::of($purchases)
            ->addColumn('action', function ($purchase) {
                return
                    '<a class="btn btn-primary btn-sm" href="/purchase/' . $purchase->id . '">Edit</a>
                     <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $purchase->id . '"
                      data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>
                  ';
            })
            ->editColumn('products_id', function (PurchaseOrder $purchase) {
                return Product::find($purchase->products_id)->name ?? 'N/A';
            })
            ->editColumn('product_brands_id', function (PurchaseOrder $purchase) {
                return ProductBrand::find($purchase->product_brands_id)->name ?? 'N/A';
            })
            ->editColumn('product_vendors_id', function (PurchaseOrder $purchase) {
                return ProductVendor::find($purchase->product_vendors_id)->name ?? 'N/A';
            })
            ->editColumn('id', function (PurchaseOrder $purchase) {
                return 'PO-' . $purchase->id;
            })
            ->rawColumns(['action'])
            ->make();
        ob_clean();
        return $d;
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function destroy($purchaseOrder)
    {
        $purchase = PurchaseOrder::find($purchaseOrder);
        $product = Product::findOrFail($purchase->products_id);
        $product->quantity -= $purchase->quantity;
        $product->purchase_amount -= $purchase->total;
        $product->save();
        $purchase->delete();
        ob_clean();
        return response()->json(['success' => 'Item deleted successfully.']);
    }
}
