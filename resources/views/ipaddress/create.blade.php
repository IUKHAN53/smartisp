@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">IP Address</h4>
                <h6 class="card-subtitle"> Add new IP </h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('ipaddress.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <span style="color: red;">*</span><label>IP Address</label>
                        <input type="text" class="form-control required" id="exampleInputEmail1" name="address" placeholder="XX:XX:XX:XX/XX">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label >Network</label>
                        <input type="text" class="form-control required" id="exampleInputEmail1" name="network" placeholder="XX:XX:XX:XX">
                    </div>
                    <div class="form-group">
                        <label for="mikrotik"> Interface : <span class="danger">*</span> </label>
                        <select class="custom-select form-control required" id="interface"
                                name="interface">
                            <option value="">Select Interface</option>
                            @foreach($int as $i)
                                <option value="{{$i['name']}}">{{$i['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
