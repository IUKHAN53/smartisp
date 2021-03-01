@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add Leave for employee</h2>
                        </div>
                    </div>
                </div>
                <form action="{{route('leave.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="employee_id">Employee Name:</label>
                        <select class="custom-select form-control " id="employee_id"
                                                                 name="employee_id" >
                            <option value="">Select Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}">{{$employee->user->name}}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description"
                               placeholder="Enter Type of leave">
                        @error('description')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date:</label>
                        <input type="date" class="form-control" id="start" name="start">
                        @error('start')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="end">End Date:</label>
                        <input type="date" class="form-control" id="end" name="end">
                        @error('end')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>

                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
