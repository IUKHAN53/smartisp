<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

    private $salary_rules = [
        'employee_id' => 'required',
        'salary' => 'required|numeric',
        'salary_for' => 'required',
        'status' => 'required',
    ];

    public function index()
    {
        return view('hrm.salary.index')->with([
            'salaries' => Salary::with('employee')->get()
        ]);
    }


    public function create()
    {
        return view('hrm.salary.create')->with([
            'employees' => Employee::with('user')->get()
        ]);
    }

    public function store(Request $request)
    {
        $new_salary = $request->validate($this->salary_rules);
        if (Salary::create($new_salary)) {
            toastr()->success('Salary Added Successfully!');
            return redirect(route('salary.index'));
        } else {
            toastr()->error('Something Went wrong Please try later');
            return redirect()->back();
        }
    }

    public function show(Salary $salary)
    {
        //
    }

    public function edit(Salary $salary)
    {
        return view('hrm.salary.edit', ['salary' => $salary, 'employees' => Employee::all()]);
    }

    public function update(Request $request, Salary $salary)
    {
        $new_salary = $request->validate($this->salary_rules);
        if ($salary->update($new_salary)) {
            toastr()->success('Salary Updated Successfully!');
            return redirect(route('salary.index'));
        } else {
            toastr()->error('Something Went wrong Please try later');
            return redirect()->back();
        }
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
    }
}
