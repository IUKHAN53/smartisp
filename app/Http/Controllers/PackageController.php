<?php

namespace App\Http\Controllers;

use App\Mikrotik;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{

    public function index()
    {
        $mkt = Mikrotik::first();
        return view('package.index',[
            'profile' => $mkt->packages
        ]);
    }

    public function create()
    {
        dd('not done yet');
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function setSyn(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        if($request['syn']!= ''){
            $package->synonym = $request['syn'];
            $package->save();
            return redirect('/package')->with('success','Saved Succesfully');}
        else
            return redirect('/package')->with('failed','Please insert Data into field');
    }
}
