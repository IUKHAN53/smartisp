@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Add New ticket</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('ticket.index') }}">Back</a>
                        </div>
                    </div>
                </div>
                <form action="{{route('ticket.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <select class="custom-select form-control " id="category"
                                name="category" >
                            <option value="">Ticket Category</option>
                            @foreach($data['category'] as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control " id="franchise"
                                name="franchise" >
                            <option value="">Franchise</option>
                            @foreach($data['franchise'] as $franchise)
                                <option value="{{$franchise->id}}">{{$franchise->franchisename}}</option>
                            @endforeach
                        </select>
                        @error('franchise')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="Enter Title" >
                        @error('title')
                        <div class="text-danger">{{$message}}</div>@enderror

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="content" name="content"
                               placeholder="Enter Content" >
                        @error('content')
                        <div class="text-danger">{{$message}}</div>@enderror

                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control " id="priority"
                                name="priority" >
                            <option value="">Priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        @error('priority')
                        <div class="text-danger">{{$message}}</div>@enderror

                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control " id="assign_to"
                                name="assign_to" >
                            <option value="">Assign Ticket To</option>
                            @foreach($data['users'] as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('assign_to')
                        <div class="text-danger">{{$message}}</div>@enderror

                    </div>

                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
@endsection
