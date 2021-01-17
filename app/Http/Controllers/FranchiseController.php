<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Franchise;
use App\Package;
use App\User;
use App\Policestation;
use App\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class FranchiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $franchise = Franchise::all();
        $data = collect();
        foreach ($franchise as $f) {
            $profiles = DB::table('shared_franchise_profile')->where('franchise_id', '=', $f['id'])->get();
            $data->push([
                'franchise' => $f,
                'profiles' => $profiles,
            ]);
        }
        return view('franchise.index', [
            'data' => $data,
            'counter' => 1,
        ]);
    }

    public function create()
    {
        return view('franchise.create', [
            'districts' => District::all(),
            'division' => Division::all(),
            'ps' => Policestation::all(),
            'upazila' => Upazila::all(),
            'roles' => Role::all(),
            'mkt' => Auth::User()->mikrotiks,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'fname' => 'required',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required',
            'address' => 'required',
            'prefix' => '',
            'creditlimit' => 'required',
            'permissiongroup' => 'required',
            'division' => 'required',
            'district' => 'required',
            'upazila' => 'required',
            'price' => 'required',
            'ps' => 'required',
        ]);
        $user = User::create([
            'name' => $data['fname'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'created_by' => Auth::id(),
        ]);
        $user->assignRole($request->input('permissiongroup'));
        $franchise = Franchise::create([
            'franchisename' => $data['fname'],
            'mobile' => $data['phone'],
            'address' => $data['address'],
            'creditlimit' => $data['creditlimit'],
            'prefix' => $data['prefix'],
            'division_id' => $data['division'],
            'district_id' => $data['district'],
            'upazila_id' => $data['upazila'],
            'ps_id' => $data['ps'],
        ]);
        foreach ($request['ids'] as $item) {
            $is = DB::table('shared_franchise_profile')->insert([
                [
                    'franchise_id' => $franchise->id,
                    'package_id' => $item,
                    'price' => isset($request['cost'][$item]) ? $request['cost'][$item] : $request['price']
                ]
            ]);
        }
        return redirect('/franchise')->with('success','added successfully');
    }

    public function show(Franchise $franchise)
    {

    }
    public function franchiseUser(Request $request)
    {

    }

    public function edit(Franchise $franchise)
    {

    }

    public function update(Request $request, Franchise $franchise)
    {

    }

    public function destroy(Franchise $franchise)
    {
    }

    public function createUser(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            ]);
    }
}
