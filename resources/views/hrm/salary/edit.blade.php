@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit employee</h2>
                        </div>
                    </div>
                </div>
                <form action="{{route('employee.update',['employee'=>$employee->id])}}" id="user_form" method="POST" class="mt-4">
                    @method('PATCH')
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter User Name" value="{{$employee->user->name}}">
                                    @error('name')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                           placeholder="Enter User Name" value="{{$employee->user->username}}">
                                    @error('username')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email"
                                           name="email"
                                           placeholder="Enter Email" value="{{$employee->user->email}}">
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control"
                                           id="password" name="password"
                                           placeholder="Enter Password">
                                    @error('password')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="c_password">Confirm Password</label>
                                    <input type="password"
                                           class="form-control"
                                           id="c_password"
                                           name="password_confirmation"
                                           placeholder="Confirm Password">
                                    @error('c_password')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control"
                                           id="dob" name="dob" value="{{$employee->dob}}"
                                           placeholder="Enter Date of Birth">
                                    @error('dob')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" id="age"
                                           name="age" value="{{$employee->age}}"
                                           placeholder="Enter Age">
                                    @error('age')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employment_start">Start of Employment</label>
                                    <input type="date" value="{{$employee->employment_start}}"
                                           class="form-control"
                                           id="employment_start"
                                           name="employment_start"
                                           placeholder="Enter Start of Employment">
                                    @error('employment_start')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="custom-select form-control "
                                            id="gender"
                                            name="gender">
                                        <option value="">Gender</option>
                                        <option value="m" {{$employee->gender == 'm'?'selected':''}}>Male</option>
                                        <option value="f" {{$employee->gender == 'f'?'selected':''}}>Female</option>
                                        <option value="o" {{$employee->gender == 'o'?'selected':''}}>Other</option>
                                    </select>
                                    @error('gender')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Employee Position</label><select
                                        class="custom-select form-control " id="position"
                                        name="position_id">
                                        <option value="">Employee Position</option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}"
                                            {{($employee->position_id == $position->id)?'selected':''}}>
                                                {{$position->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supervisor">Supervisor</label><select
                                        class="custom-select form-control " id="supervisor"
                                        name="supervisor_id">
                                        <option value="">Supervisor</option>
                                        @foreach($supervisors as $supervisor)
                                            <option value="{{$supervisor->id}}"
                                                {{($employee->supervisor_id == $supervisor->id)?'selected':''}}>
                                                {{$supervisor->user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('supervisor')
                                    <div class="text-danger">{{$message}}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" rows="3" id="address" name="address">{{$employee->address}}</textarea>
                            @error('address')
                            <div class="text-danger">{{$message}}</div>@enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update Details"/>
                </form>
            </div>
        </div>
    </div>
@endsection
