<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        return view('hrm.department.index')->with([
            'departments' => Department::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $id = $request->pos_id;

        if($name){
            Department::updateOrCreate(['id'=>$id],['name'=>$name]);
        }else{
            toastr()->info("Please Put some name for the department");
        }
        return redirect()->back();
    }


    public function show(Department $department)
    {
        //
    }


    public function edit(Department $department)
    {
        //
    }


    public function update(Request $request, Department $department)
    {
        //
    }

    public function destroy(Department $department)
    {
        $department->delete();
    }
}
