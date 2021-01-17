<?php

namespace App\Http\Controllers;

use App\Customer_type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Customer_typeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $type  = Customer_type::all();
        return view('customer.viewtypes')->with('types',$type);
    }

    public function create()
    {
        return view('customer.addtype');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'details' => 'required|max:255',
            ]);
        Customer_type::create($validatedData);
        return redirect('customertype')->with('success','New type added succesfully');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $cust = Customer_type::findOrFail($id);
        $cust->delete();
        return redirect('customertype')->with('success','Type Deleted succesfully');
    }
}
