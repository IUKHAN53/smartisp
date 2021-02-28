<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

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
        $new_salary = $request->validate([

        ]);

    }
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
