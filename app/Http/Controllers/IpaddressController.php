<?php

namespace App\Http\Controllers;

use App\Intrface;
use App\Ipaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IpaddressController extends Controller
{


    public function index()
    {
        $ips = Ipaddress::all();
        return view('ipaddress.index',[
            'ip' => $ips,
        ]);
    }

    public function create()
    {
        $int = Intrface::all();
        return view('ipaddress.create',[
            'int' => $int,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required',
            'network' => 'required|ipv4',
            'interface' => 'required',
        ]);
        dd($request->all());
        if(session()->has('active')){
$mkt = session('active');};
        $mkt->ipaddress()->create($validatedData);
        return redirect('ipaddress.index')->with('success','Added IP successfully');
    }

    public function show(Ipaddress $ipaddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ipaddress  $ipaddress
     * @return \Illuminate\Http\Response
     */
    public function edit(Ipaddress $ipaddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ipaddress  $ipaddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ipaddress $ipaddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ipaddress  $ipaddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ipaddress $ipaddress)
    {
        //
    }
}
