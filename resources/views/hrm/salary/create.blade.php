@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add Salary</h2>
                        </div>
                    </div>
                </div>
                <form action="{{route('salary.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_id">Employee Name</label>
                                    <select class="custom-select form-control "
                                            id="employee_id"
                                            name="employee_id">
                                        <option value="">Select Employee</option>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('employee_id')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="number" class="form-control" id="salary" name="salary"
                                           placeholder="Enter Salary">
                                    @error('salary')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from">Salary From</label>
                                    <input type="date" class="form-control"
                                           id="from" name="from">
                                    @error('from')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to">Salary To</label>
                                    <input type="date" class="form-control" id="to"
                                           name="to">
                                    @error('to')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="custom-select form-control "
                                            id="status"
                                            name="status">
                                        <option value="">Choose Status</option>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">UnPaid</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Create"/>
                </form>
            </div>
        </div>
    </div>
@endsection
