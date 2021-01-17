@extends('layouts.template')

@section('content')
    <div class="col-12 m-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new User to Hotspot</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('hotspotuser.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="server">Server</label>
                        <input type="text" class="form-control" id="server" name="server"
                               placeholder="Enter Server">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="profile">Profile</label>
                        <input type="text" class="form-control" id="profile" name="profile" placeholder="Profile">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="timelimit">Time Limit</label>
                        <input type="text" class="form-control" id="timelimit" name="timelimit"
                               aria-describedby="emailHelp" placeholder="Enter Time Limit">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="datelimit">Date Limit</label>
                        <input type="text" class="form-control" id="datelimit" name="datelimit"
                               aria-describedby="datelimit" placeholder="Enter Date Limit">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="comment">Comment</label>
                        <input type="text" class="form-control" id="comment" name="comment"
                               aria-describedby="emailHelp" placeholder="Enter Comments">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
