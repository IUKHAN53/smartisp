<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $permissions = Permission::all();
        return view('permission.index',[
            'i' => 1,
            'permissions' => $permissions,
        ]);
    }


    public function create()
    {
        $permission = Permission::get();
        return view('permission.create',compact('permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);
        Permission::create(['name' => $request->input('name')]);
        return redirect()->route('permission.index')
            ->with('success','Permission created successfully');
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permission.show',compact('permission'));
    }


    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permission.edit',compact('permission'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $permission = Permission::findOrFail($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permission.index')
            ->with('success','Permission updated successfully');
    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permission.index')
            ->with('success','Permission deleted successfully');
    }
}
