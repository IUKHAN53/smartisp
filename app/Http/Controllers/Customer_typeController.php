<?php

namespace App\Http\Controllers;

use App\Customer_type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Customer_typeController extends Controller
{


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

    }

    public function edit($customer_type)
    {

        return view('customer.edittype')->with('type',Customer_type::findOrFail($customer_type));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'details' => 'required|max:255',
        ]);
        $cusomer_type = Customer_type::findOrFail($id);
        $cusomer_type->type = $validatedData['type'];
        $cusomer_type->details = $validatedData['details'];
        $cusomer_type->save();
        return redirect('customertype')->with('success','New type added succesfully');
    }

    public function destroy($id)
    {
        $cust = Customer_type::findOrFail($id);
        $cust->delete();
        return redirect('customertype')->with('success','Type Deleted succesfully');
    }
}
