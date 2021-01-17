@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Zones</h4>
                <h6 class="card-subtitle"> Add new Zone </h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('zone.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <span style="color: red;">*</span><label>Zone Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label >Zone Abbreviation</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="abbr" placeholder="Enter Abbreviation">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label>Franchise/POP Owner</label>
                        <input type="text" class="form-control" name="area_owner" id="exampleInputEmail1" placeholder="Owner">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputPassword1">Employee</label>
                        <input type="text" class="form-control" name="employee" id="exampleInputEmail1" placeholder="Employee">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
