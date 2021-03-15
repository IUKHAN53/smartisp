@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new Mikrotik</h4>
                <h6 class="card-subtitle"> Add a new mikrotik for {{auth()->user()->name}} </h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('mikrotik.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">MikroTik Identity</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="identity" placeholder="Enter MikroTik Identity">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">MikroTik IP</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="host" placeholder="xx:xx:xx:xx">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputPassword1">API User Name</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputPassword1">API User Password </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">API Port</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="port" aria-describedby="emailHelp" placeholder="Default Port 8728">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">Site Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="sitename" aria-describedby="emailHelp" placeholder="Enter Site Name">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="address" aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
