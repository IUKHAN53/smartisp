@extends('layouts.template')

@section('content')
    <div class="col-12 m-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Hotspot User Profile</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('hotspotprofile.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="pool"
                                name="ppool">
                            <option value="">Select Address Pool</option>
                            @foreach($pools as $p)
                                    <option id="option" value="{{$p['name']}}">{{$p['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sharedusers" id="sharedusers"
                               placeholder="Enter Shared User">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ratelimit" name="ratelimit" placeholder="Rate limit [up/down]">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" name="expmode">
                            <option value="">Select...</option>
                            <option value="0">None</option>
                            <option value="rem">Remove</option>
                            <option value="ntf">Notice</option>
                            <option value="remc">Remove & Record</option>
                            <option value="ntfc">Notice & Record</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="validity" name="validity"
                                placeholder="Enter validity">
                    </div>
                    <input class="form-control" type="text" id="gracepi" size="4" autocomplete="off" name="graceperiod" placeholder="5m" value="5m" required="1" hidden>
                    <div class="form-group">
                        <input class="form-control" type="text" size="10" min="0" name="price" value=""  placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" size="10" min="0" name="sprice" value="" placeholder="Enter Selling Price">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="lockunlock" name="lockunlock">
                            <option value="">Lock User</option>
                            <option value="Disable">Disable</option>
                            <option value="Enable">Enable</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="pool"
                                name="parent">
                            <option value="">Select Parent Queue</option>
                            @foreach($queues as $q)
                                <option id="option" value="{{$q['name']}}">{{$q['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
