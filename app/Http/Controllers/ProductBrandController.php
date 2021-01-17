<?php

namespace App\Http\Controllers;

use App\ProductBrand;
use App\ProductCategory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ProductBrandController extends Controller
{

    public function index()
    {
        $i = 1;
        $data = ProductBrand::select(['id', 'name', 'status'])->get();
        return view('inventory.product.brand.index', [
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
            'brand' => "required",
        ]);
        ProductBrand::create(['name' => $request->brand]);
        Toastr::success('Added new Category Succesfully', 'Success');
        $response = array(
            'status' => 'success',
            'msg' => 'SuccessFull',
        );
        ob_clean();
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBrand $productBrand)
    {
        //
    }

    public function destroy( $productBrand)
    {
        $p = ProductBrand::findOrFail($productBrand);
        $p->delete();
        Toastr::success('Deleted Succesfully', 'Success');
        return redirect('/productbrand');
    }
}
