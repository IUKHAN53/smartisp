<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Franchise;
use App\Policestation;
use App\Pop;
use App\Upazila;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PopController extends Controller
{
    public function index()
    {
        $pop = Pop::all();
        $data = collect();
        foreach ($pop as $f) {
            $profiles = DB::table('shared_pop_profile')->where('pop_id', '=', $f['id'])->get();
            $data->push([
                'pop' => $f,
                'profiles' => $profiles,
            ]);
        }
        return view('pop.index', [
            'data' => $data,
            'counter' => 1,
        ]);
    }

    public function create()
    {
        return view('pop.create', [
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
        $pop = Pop::create([
            'popname' => $data['fname'],
            'mobile' => $data['phone'],
            'address' => $data['address'],
            'prefix' => $data['prefix'],
            'division_id' => $data['division'],
            'district_id' => $data['district'],
            'upazila_id' => $data['upazila'],
            'ps_id' => $data['ps'],
        ]);
        foreach ($request['ids'] as $item) {
            $is = DB::table('shared_pop_profile')->insert([
                [
                    'pop_id' => $pop->id,
                    'package_id' => $item,
                    'price' => isset($request['cost'][$item]) ? $request['cost'][$item] : $request['price']
                ]
            ]);
        }
        return redirect('/pop')->with('success','added successfully');
    }

    public function show(Pop $pop)
    {
    }

    public function edit(Pop $pop)
    {
    }

    public function update(Request $request, Pop $pop)
    {
    }

    public function destroy(Pop $pop)
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
