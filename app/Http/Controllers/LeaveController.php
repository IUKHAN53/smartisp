<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeLeave;
use App\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return view('hrm.leave.index')->with([
            'leaves' => EmployeeLeave::all()
        ]);
    }

    public function create()
    {
        return view('hrm.leave.create')->with([
            'employees' => Employee::all()
        ]);
    }
    public function store(Request $request)
    {
        $leave = $request->validate([
            'employee_id' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        if(EmployeeLeave::create($leave)){
            toastr()->success('Leave added Successfully!');
            return redirect(route('leave.index'));
        }else{
            toastr()->error('Something Went wrong Please try later');
            return redirect()->back();
        }
    }


    public function show($leave)
    {
        //
    }

    public function edit($leave)
    {
        //
    }

    public function update(Request $request, $leave)
    {
        //
    }

    public function destroy($leave)
    {
        $leave = EmployeeLeave::find($leave);
        $leave->delete();
    }
}
