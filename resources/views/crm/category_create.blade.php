@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add New Category</h2>
                        </div>
                    </div>
                </div>
                <form action="{{route('ticket-category.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="Enter title" >
                        @error('title')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
