@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Type</h4>
                <h6 class="card-subtitle"> Add a new Customer Type </h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('customertype.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="type">Customer Type</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="details">Customer Details</label>
                        <input type="text" class="form-control" id="details" name="details" >
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
