<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $user_rules = [
        'name' => 'required',
        'username' => 'required|unique:users,username',
        'email' => 'required|unique:users,email',
        'password' => 'required|confirmed|min:8'
    ];
    protected $user_update_rules = [
        'name' => 'required',
        'username' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];
    protected $employee_rules = [
        'dob' => 'date',
        'age' => 'numeric',
        'gender' => '',
        'address' => '',
        'employment_start' => 'required|date',
        'position_id' => 'required',
        'supervisor_id' => ''
    ];

    public function index()
    {
        return view('hrm.employee.index')->with([
            'employees' => Employee::all()
        ]);
    }

    public function create()
    {
        return view('hrm.employee.create')->with([
            'positions' => Position::all(),
            'supervisors' => Employee::all()
        ]);
    }

    public function store(Request $request)
    {
        $new_user =  $request->validate($this->user_rules);
        $new_employee = $request->validate($this->employee_rules);

        $new_user['created_by'] = auth()->id();
        $user = User::create($new_user);
        $new_employee['user_id'] = $user->id;
        $employee = Employee::create($new_employee);

        if($employee){
            toastr()->success('New Employee Created Successfully!');
            return redirect(route('employee.index'));
        }else{
            toastr()->error('Something Went wrong Please try later');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        return view('hrm.employee.edit')->with([
            'employee' => $employee,
            'positions' => Position::all(),
            'supervisors' => Employee::all()
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $update_user =  $request->validate($this->user_update_rules);
        $update_user['created_by'] = auth()->id();
        $employee->user()->update($update_user);
        $new_employee = $request->validate($this->employee_rules);
        $employee = $employee->update($new_employee);
        if($employee){
            toastr()->success('Employee Updated Successfully!');
            return redirect(route('employee.index'));
        }else{
            toastr()->error('Something Went wrong Please try later');
            return redirect()->back();
        }
    }

    public function destroy(Employee $employee)
    {
        $employee->user()->delete();
        $employee->delete();
    }
}
