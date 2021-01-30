@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Ticket Management</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('ticket.create') }}"> Add New Ticket</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Ticket Category</th>
                    <th>Status</th>
                    <th>Ticket By<span class="text-info">(Total Tickets)</span></th>
                    <th>Assigned to</th>
                    <th>Log Detail</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $ticket)
                    <tr>
                        <td>Ticket-{{$ticket->id}}</td>
                        <td>{{$ticket->ticket_category->name}}</td>
                        <td><button href="#" class="btn btn-outline-info">{{$ticket->status}}</button></td>
                        <td>{{$ticket->ticket_by->name}}<span class="text-info">({{\App\Ticket::where('ticket_by_id',$ticket->ticket_by->id)->count()}})</span></td>
                        <td>{{$ticket->assigned_to->name}}</td>
                        <td>
                            @foreach($ticket->log as $log)
                                {{$log->message}}<br>
                            @endforeach
                        </td>
                        <td><button href="#" class="btn btn-outline-danger"><i class="ti ti-trash"></i></button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
