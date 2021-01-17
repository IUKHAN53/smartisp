<?php

namespace App\Http\Controllers;

use App\ProductUnit;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductUnitController extends Controller
{

    public function index()
    {
        $i = 1;
        $data = ProductUnit::select(['id', 'name', 'status'])->get();
        return view('inventory.product.unit.index', [
            'i' => $i,
            'data' => $data
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit' => "required",
        ]);
        ProductUnit::create(['name' => $request->unit]);
        $response = array(
            'status' => 'success',
            'msg' => 'SuccessFull',
        );
        ob_clean();
        return response()->json($response);
    }

    public function show(ProductUnit $ProductUnit)
    {
        //
    }

    public function edit(ProductUnit $ProductUnit)
    {
        //
    }


    public function update(Request $request, ProductUnit $ProductUnit)
    {
        //
    }

    public function destroy( $ProductUnit)
    {
        $p = ProductUnit::findOrFail($ProductUnit);
        $p->delete();
        Toastr::success('Deleted Succesfully', 'Success');
        return redirect('/ProductUnit');
    }
}
