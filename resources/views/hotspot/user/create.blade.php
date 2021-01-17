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
                        <select class="custom-select form-control required" id="server"
                                name="server" >
                            <option value="">Select Server</option>
                            @foreach($servers as $s)
                                <option id="option" value="{{$s['id']}}">{{$s['name']}}
                                    <small>({{$s['profile']}})</small></option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="profile"
                                name="profile">
                            <option value="">Select Profile</option>
                            @foreach($profiles as $s)
                                @if($s['synonym']=='')
                                    <option id="option" value="{{$s['name']}}">{{$s['name']}}</option>
                                @else
                                    <option id="option" value="{{$s['name']}}">{{$s['synonym']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="timelimit" name="timelimit"
                                placeholder="Enter Time Limit">
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="datalimit" class="form-control" aria-label="Text input with dropdown button" placeholder="Data Limit">
                        <div class="input-group-append">
                            <select class="custom-select form-control required" id="profile"
                                    name="size">
                                <option value="mb">MB</option>
                                <option value="gb">GB</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
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
