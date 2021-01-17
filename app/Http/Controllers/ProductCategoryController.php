<?php

namespace App\Http\Controllers;

use App\District;
use App\ProductCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yoeunes\Toastr\Facades\Toastr;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $i = 1;
        $data = ProductCategory::select(['id', 'name', 'status'])->get();
        return view('inventory.product.category.index', [
            'i' => $i,
            'data' => $data
        ]);
    }

    public function getcategories(Request $request)
    {
        $response = array(
            'status' => 'success',
            'msg' => $request->category,
        );
        ob_clean();
        return response()->json($response);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => "required",
        ]);
        ProductCategory::create(['name' => $request->category]);
        Toastr::success('Added new Category Succesfully', 'Success');
        $response = array(
            'status' => 'success',
            'msg' => 'SuccessFull',
        );
        ob_clean();
        return response()->json($response);
    }

    public function show(ProductCategory $productCategory)
    {
        //
    }

    public function edit(ProductCategory $productCategory)
    {
        //
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    public function destroy($productCategory)
    {
        $p = ProductCategory::findOrFail($productCategory);
        $p->delete();
        Toastr::success('Deleted Succesfully', 'Success');
        return redirect('/productcategory');
    }
}
