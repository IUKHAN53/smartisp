<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductUnit;
use App\ProductVendor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yoeunes\Toastr\Facades\Toastr;

class ProductVendorController extends Controller
{

    public function index()
    {
        return view('inventory.product.vendor.index');
    }

    public function getvendors()
    {
        $vendors = ProductVendor::select([
            'id', 'name', 'status', 'address', 'phone', 'contact_person', 'created_at', 'updated_at'
        ]);
        $d = Datatables::of($vendors)
            ->addColumn('action', function ($vendor) {
                return
                    '<a class="btn btn-primary btn-sm" href="/productvendor/' . $vendor->id . '">Edit</a>
                     <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $vendor->id . '"
                      data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>
                  ';
            })
            ->editColumn('name', function (ProductVendor $vendor) {
                return '<a href="/productvendor/' . $vendor->id . '">' . $vendor->name . '</a>';
            })
            ->editColumn('status', function (ProductVendor $vendor) {
                if ($vendor->status === 0)
                    return '<i class="fas fa-circle" style="color:red;font-size: 1.5em;">';
                return '<i class="fas fa-circle" style="color:limegreen;font-size: 1.5em;">';
            })
            ->editColumn('created_at', function (ProductVendor $vendor) {
                return $vendor->created_at->diffForHumans() ?? 'N/A';
            })
            ->editColumn('updated_at', function (ProductVendor $vendor) {
                return $vendor->updated_at->diffForHumans() ?? 'N/A';
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
            'address' => "required",
            'phone' => "required",
            'contact' => "required",
        ]);
        ProductVendor::updateOrCreate([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'contact_person' => $request->contact,
        ]);
        Toastr::success('Added new Category Succesfully', 'Success');
        $response = array(
            'status' => 'success',
            'msg' => 'SuccessFull',
        );
        ob_clean();
        return response()->json($response);
    }


    public function show(ProductVendor $vendor)
    {
        dd("Details of " . $vendor->name . " go here");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProductVendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVendor $vendor)
    {
        dd('purrrrrrrrrrrrrrrr');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductVendor $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVendor $vendor)
    {
        //
    }

    public function destroy($ven)
    {
        $vendor = ProductVendor::find($ven);
        $vendor->delete();
        ob_clean();
        return response()->json(['success' => 'Item deleted successfully.']);
    }
}
