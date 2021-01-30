@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Ticket Categories</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('ticket-category.create') }}"> Add New Category</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td><button href="#" class="btn btn-outline-danger"><i class="ti ti-trash"></i></button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
