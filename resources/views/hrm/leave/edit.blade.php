@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card m-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Ticket</h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('ticket.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="createdby">Ticket Created By:</label>
                        <input type="text" class="form-control" id="createdby" name="content" readonly
                               placeholder="Enter Content" value="{{$ticket->ticket_by->name}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Ticket Category:</label><select class="custom-select form-control"
                                                                              id="category"
                                                                              name="category">
                            <option value="">Ticket Category</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{($category->id == $ticket->id)?'selected':''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="franchise">Franchise</label><select class="custom-select form-control "
                                                                        id="franchise"
                                                                        name="franchise">
                            <option value="">Franchise</option>
                            @foreach($franchises as $franchise)
                                <option
                                    value="{{$franchise->id}}" {{($franchise->id == $ticket->franchise_id)?'selected':''}}>{{$franchise->franchisename}}</option>
                            @endforeach
                        </select>
                        @error('franchise')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="Enter Title" value="{{$ticket->title}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content"
                               name="content"
                               placeholder="Enter Content"
                               value="{{$ticket->content}}">
                        @error('content')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="custom-select form-control " id="priority"
                                name="priority">
                            <option value="">Priority</option>
                            <option value="low" {{($ticket->priority == 'low')?'selected':''}}>Low</option>
                            <option value="medium" {{($ticket->priority == 'medium')?'selected':''}}>Medium</option>
                            <option value="high" {{($ticket->priority == 'high')?'selected':''}}>High</option>
                        </select>
                        @error('priority')
                        <div class="text-danger">{{$message}}</div>@enderror

                    </div>
                    <div class="form-group">
                        <label for="assign_to">Assigned To:</label>
                        <select class="custom-select form-control "
                                id="assign_to"
                                name="assign_to">
                            <option value="">Assign Ticket To</option>
                            @foreach($users as $user)
                                <option
                                    value="{{$user->id}}" {{($user->id == $ticket->assigned_to_id)?'selected':''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('assign_to')
                        <div class="text-danger">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Set Status</label>
                        <select class="custom-select form-control " id="status"
                                name="status">
                            <option value="">Status</option>
                            <option value="closed" {{($ticket->status == 'closed')?'selected':''}}>Closed</option>
                            <option value="pending" {{($ticket->status == 'pending')?'selected':''}}>Pending</option>
                            <option value="in-progress" {{($ticket->status == 'in-progress')?'selected':''}}>In-Progress</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{$message}}</div>@enderror

                    </div>
                    <input type="submit" class="btn btn-primary" value="Update Ticket"/>
                </form>
            </div>

        </div>
    </div>
@endsection
