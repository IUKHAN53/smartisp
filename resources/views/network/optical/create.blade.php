@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Optical Network Terminal</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form p-t-20" method="POST" action="{{route('optical.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputuname">OLT Brand</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Select OLT Brand" name="brand" aria-label="brand"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputuname">OLT Model No</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list-ol"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter OLT Model No" name="model" aria-label="model"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputuname">Total PON</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list"></i></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Select Total PON" name="totalpon" aria-label="pon"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputuname">ONU Per Pon</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list-ol"></i></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Enter ONU Per Pon" name="onuperpon" aria-label="onu"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputuname">Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-location-arrow"></i></span>
                                    </div>
                                    <textarea type="text" class="form-control" placeholder="Enter Address" name="address" aria-label="address"
                                           aria-describedby="basic-addon1">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
