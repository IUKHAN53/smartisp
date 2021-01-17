@extends('layouts.template')

@section('content')
    <div class="col-12 pt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Billing</h4>
                <h6 class="card-subtitle"> Edit Billing Details</h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
{{--                <form action="#" method="POST" class="mt-4">--}}
{{--                    @method('PATCH')--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1">Host name</label>--}}
{{--                        <input type="text" class="form-control" id="exampleInputEmail1" value="" name="host" placeholder="Enter Host Address">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputPassword1">Username</label>--}}
{{--                        <input type="text" class="form-control" name="username"  value="" id="exampleInputEmail1" placeholder="Username">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputPassword1">Password</label>--}}
{{--                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1">Port</label>--}}
{{--                        <input type="text" class="form-control" id="exampleInputEmail1"  value="" name="port" aria-describedby="emailHelp" placeholder="Enter port">--}}
{{--                    </div>--}}
{{--                    <input type="submit" class="btn btn-primary" value="Update"/>--}}
{{--                </form>--}}
                <h1>In Progress</h1>
            </div>
        </div>
    </div>
@endsection
