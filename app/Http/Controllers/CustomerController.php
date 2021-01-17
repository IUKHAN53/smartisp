<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Customer_type;
use App\District;
use App\Intrface;
use App\Ipaddress;
use App\Mikrotik;
use App\Package;
use App\Policestation;
use App\Queue_type;
use App\Upazila;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;
use Yajra\DataTables\Facades\DataTables;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('customer.index');
    }

    public function create()
    {
        $zone = Zone::all();
        $mikrrotik = Mikrotik::all();
        $package = Package::all();
        $customer_type = Customer_type::all();
        $upazila = Upazila::all();
        $police_station = Policestation::all();
        $district = District::all();
        $queue_type = Queue_type::all();
        $ip = Ipaddress::all();
        $int = Intrface::all();
        return view('customer.create', [
            'zones' => $zone,
            'package' => $package,
            'mikrotiks' => $mikrrotik,
            'customer_type' => $customer_type,
            'upazila' => $upazila,
            'police_station' => $police_station,
            'district' => $district,
            'queue_type' => $queue_type,
            'ip' => $ip,
            'int' => $int,
        ]);
    }


    public function store(Request $request)
    {

//        $validatedData = $request->validate([
//            'queue_name' => 'required',
//            'queue_ip' => 'required|ipv4',
//            'queue_dst' => 'required',
//            'queue_type' => 'required',
//            'max_limit' => '',
//            'burst_limit' => '',
//            'burst_threshhold' => '',
//            'burst_time' => '',
//            'queue_comment' => '',
//        ]);
        $c_type = $request->get('connection_type');

//        try {
//            $config = (new Config())
//                ->set('timeout', 1)
//                ->set('host', $mkt->host)
//                ->set('user', $mkt->username)
//                ->set('pass', $mkt->password)
//                ->set('port', (int)$mkt->port);
//            $client = new Client($config);
//            $query = new Query('/queue/simple/add');
//            if ($c_type === 'si_private_queue' || $c_type === 'si_public_queue') {
//                if ($request->get('queue_type') != null) {
//                    $query->equal('name', $request->get('queue_name'));
//                    $query->equal('target', $request->get('queue_ip'));
//                    $query->equal('dst', $request->get('queue_dst'));
//                    $query->equal('priority', $request->get('queue_priority'));
//                    $query->equal('queue', ($request->get('queue_type') . '/' . $request->get('queue_type')));
//                    $query->equal('comment', $request->get('queue_comment'));
//                } else {
//                    $query->equal('name', $request->get('queue_name'));
//                    $query->equal('target', $request->get('queue_ip'));
//                    $query->equal('dst', $request->get('queue_dst'));
//                    $query->equal('priority', $request->get('queue_priority'));
//                    $query->equal('max-limit', $request->get('max_limit'));
//                    $query->equal('burst-limit', $request->get('burst_limit'));
//                    $query->equal('burst-threshold', $request->get('burst_threshhold'));
//                    $query->equal('burst-time', $request->get('burst_time'));
//                    $query->equal('disabled', 'no');
//                    $query->equal('comment', $request->get('queue_comment'));
//                }
//                $response = $client->query($query)->read();
//            }
//        } catch (\Exception $e) {
//            dd($e);
//        }

//        if($c_type === 'si_private_queue' || $c_type === 'si_public_queue'){
//            $queue = Queue::create([
//                'mikrotik_id' => $request->get('mikrotik'),
//                'queue_type_id' => $request->get('queue_type'),
//                'id_in_mkt' => $request->get('1'),
//                'name' => $request->get('name'),
//                'target' => $request->get(''),
//                'dst' => $request->get(''),
//                'parent' => $request->get(''),
//                'max-limit' => $request->get(''),
//                'burst-limit' => $request->get(''),
//                'burst-threshold' => $request->get(''),
//                'burst-time' => $request->get(''),
//                'burst-size' => $request->get(''),
//                'comment' => $request->get(''),
//            ]);
//            $queue_id = $queue->id;
//        }
//        else{
//            $queue_id = 0;
//        }

        $presAddr = ($request->get('pr_house_no') . ', ' . $request->get('pr_road') . ', ' .
            $request->get('pr_flat') . ', ' . $request->get('pr_area') . ', PostCode: ' . $request->get('pr_post_code') .
            ', Upazilla: ' . $request->get('pr_upazilla') . ', PoliceStation: ' . $request->get('pr_police_station') . ', District: ' . $request->get('pr_district'));
        if (isset($request->sameAsPresent)) {
            $permAddr = $presAddr;
        } else {
            $permAddr = ($request->get('perm_house_no') . ', ' . $request->get('perm_road') . ', ' .
                $request->get('perm_flat') . ', ' . $request->get('perm_area') . ', PostCode: ' . $request->get('perm_post_code') .
                ', Upazilla: ' . $request->get('perm_upazilla') . ', PoliceStation: ' . $request->get('perm_police_station') . ', District: ' . $request->get('perm_district'));
        }
        try {
            $cust = Customer::create([
                'zone_id' => $request->get('zone'),
                'reg_date' => $request->get('registration_date'),
                'customer_type_id' => $request->get('customer_type'),
                'connection_type' => $request->get('connection_type'),
                'con_date' => $request->get('connection_date'),
                'mikrotik_id' => $request->get('mikrotik'),
                'full_name' => $request->get('full_name'),
                'father_name' => $request->get('father_name'),
                'mobile_no' => $request->get('mobile_no'),
                'dob' => $request->get('dob'),
                'gender' => $request->get('gender'),
                'proof_of_id' => $request->get('proof_of_id'),
                'id_num' => $request->get('id_num'),
                'occupation' => $request->get('occupation'),
//                'photo' => $request->get('photo'),
                'photo' => 'sample_photo',
                'email' => $request->get('email'),
                'pres_addr' => $presAddr,
                'perm_addr' => $permAddr,
                'service' => $request->get('service'),
                'package_id' => $request->get('profile'),
                'username' => $request->get('username') ?? 'N/A',
                'password' => $request->get('password') ?? 'N/A',
                'remote_address' => $request->get('remote_address'),
                'mac_address' => $request->get('mac_address'),
                'remote_ip' => $request->get('remote_ip'),
                'router_comment' => $request->get('router_comment'),
                'status' => 'Active',
//                'last_login' => '',
//                'queue_id' => $queue_id,
                'queue_id' => 1,
            ]);
            $cust->billing()->create([
                'monthly_bill' => $request->get('monthly_bill'),
                'perm_discount' => $request->get('perm_discount'),
                'billing_cycle' => $request->get('billing_cycle'),
                'reg_fee' => $request->get('reg_fee'),
                'send_reminder_email' => $request->get('send_email'),
                'send_reminder_sms' => $request->get('send_sms'),
                'mobile_banking' => $request->get('mobile_banking') ?? 'N/A',
                'bank_payment' => $request->get('bank_payment'),
                'bank_name' => $request->get('bank_name') ?? 'N/A',
                'bank_account_name' => $request->get('bank_account_name') ?? 'N/A',
                'bank_acc_no' => $request->get('bank_acc_no') ?? 'N/A',
                'bank_acc_branch' => $request->get('bank_acc_branch') ?? 'N/A',
            ]);
            $cust->monthly_bill()->create([
                'pending_amount' => $request->get('monthly_bill')
            ]);

        } catch (\Exception $e) {
            dd($e);
        }

        return view('customer.index');
    }

    public function getCustomers(Request $request)
    {
        $users = Customer::where('status', 'Active')->get();
        $data = collect();
        foreach ($users as $user) {
            $data->push([
                'id' => $user->reference_no,
                'full_name' => $user->full_name,
                'email' => $user->email,
                'cust_type' => Customer_type::find($user->customer_type_id)->type,
                'mikrotik' => Mikrotik::find($user->mikrotik_id)->identity,
                'package' => Package::find($user->package_id)->name,
                'zone' => Zone::find($user->zone_id)->name,
                'reg_date' => $user->reg_date,
                'status' => $user->status,
            ]);
        }
        $d = Datatables::of($data)->make();
        ob_clean();
        return $d;
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
