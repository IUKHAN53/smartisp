<?php

namespace App\Http\Controllers;

use App\Franchise;
use App\Product;
use App\ProductCategory;
use App\ProductUnit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yoeunes\Toastr\Facades\Toastr;

class ProductController extends Controller
{

    public function index()
    {
        return view('inventory.product.index', [
            'cat' => ProductCategory::all(),
            'unit' => ProductUnit::all()
        ]);
    }

    public function officeproducts()
    {
        return view('inventory.product.office_products', [
            'franchise' => Franchise::all(),
        ]);
    }
    public function createofficeproducts()
    {
        return view('inventory.product.create_office_product', [
            'franchise' => Franchise::all(),
        ]);
    }

    public function getproducts()
    {
        $products = Product::where('used', '=', '0')->select(['id', 'name', 'product_categories_id', 'created_at', 'updated_at'])->get();
        $d = Datatables::of($products)
            ->addColumn('action', function ($product) {
                return
                    '<a class="btn btn-outline-primary btn-sm" href="/product/office/' . $product->id . '"><i class="fas fa-recycle"></i>Release</a>';
            })
            ->addColumn('quantity', function ($product) {
                return '1-Piece';
            })
            ->editColumn('product_categories_id', function (Product $product) {
                return ProductCategory::find($product->product_categories_id)->name ?? 'N/A';
            })
            ->editColumn('name', function (Product $product) {
                return '<a href="/product/office/' . $product->id . '">' . $product->name . '</a>';
            })
            ->editColumn('created_at', function (Product $product) {
                return $product->created_at->diffForHumans() ?? 'N/A';
            })
            ->editColumn('updated_at', function (Product $product) {
                return $product->updated_at->diffForHumans() ?? 'N/A';
            })
            ->rawColumns(['action', 'name'])
            ->make();
        ob_clean();
        return $d;
    }

    public function getofficeproducts()
    {
        $products = Product::select([
            'id', 'name', 'quantity', 'purchase_amount', 'used', 'product_units_id', 'product_categories_id', 'created_at', 'updated_at'
        ]);
        $d = Datatables::of($products)
            ->addColumn('action', function ($product) {
                return
                    '<a class="btn btn-primary btn-sm" href="/product/' . $product->id . '">Edit</a>
                     <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $product->id . '"
                      data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>
                  ';
            })
            ->editColumn('product_categories_id', function (Product $product) {
                return ProductCategory::find($product->product_categories_id)->name ?? 'N/A';
            })
            ->editColumn('product_units_id', function (Product $product) {
                return ProductUnit::find($product->product_units_id)->name ?? 'N/A';
            })
            ->editColumn('name', function (Product $product) {
                return '<a href="/product/' . $product->id . '">' . $product->name . '</a>';
            })
            ->addColumn('stock', function (Product $product) {
                return ($product->quantity - $product->used);
            })
            ->editColumn('created_at', function (Product $product) {
                return $product->created_at->diffForHumans() ?? 'N/A';
            })
            ->editColumn('updated_at', function (Product $product) {
                return $product->updated_at->diffForHumans() ?? 'N/A';
            })
            ->rawColumns(['status', 'action', 'name'])
            ->make();
        ob_clean();
        return $d;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => "required",
            'category' => "required",
            'unit' => "required",
        ]);
        Product::updateOrCreate([
            'name' => $request->name,
            'product_categories_id' => $request->category,
            'product_units_id' => $request->unit,
        ]);
        Toastr::success('Added new Category Succesfully', 'Success');
        $response = array(
            'status' => 'success',
            'msg' => 'SuccessFull',
        );
        ob_clean();
        return response()->json($response);
    }


    public function show(Product $product)
    {
        dd("Details of " . $product->name . " go here");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        dd('purrrrrrrrrrrrrrrr');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        $product->delete();
        ob_clean();
        return response()->json(['success' => 'Item deleted successfully.']);
    }
}
