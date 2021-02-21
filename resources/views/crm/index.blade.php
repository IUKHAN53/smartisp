@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7 margin-tb">
                    <div class="pull-left">
                        <h2>Ticket Management</h2>
                    </div>
                </div>
                <div class="btn-toolbar col-lg-5" role="toolbar" aria-label="Basic example">
                    <button class="btn btn-outline-primary mr-1" onclick="location.href = '{{ route('ticket.index') }}'">All</button>
                    <button class="btn btn-outline-danger mr-1"
                            onclick="location.href = '{{ route('ticket.index',['type'=>'pending']) }}'">Pending
                    </button>
                    <button class="btn btn-outline-success mr-1"
                            onclick="location.href = '{{ route('ticket.index',['type'=>'closed']) }}'">Closed
                    </button>
                    <button class="btn btn-outline-info mr-1"
                            onclick="location.href = '{{ route('ticket.index',['type'=>'new-connection']) }}'">New
                        Connections
                    </button>
                    <button class="btn btn-outline-success mr-1" onclick="location.href = '{{ route('ticket.create') }}'"><i
                            class="fas fa-plus"></i> Add New Ticket
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ticket Category</th>
                    <th>Status</th>
                    <th>Ticket By<span class="text-info">(Total Tickets)</span></th>
                    <th>Assigned to</th>
                    <th>Log Detail</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $ticket)
                    <tr>
                        <td>Ticket-{{$ticket->id}}</td>
                        <td>{{$ticket->ticket_category->name}}</td>
                        <td>
                            <button class="btn btn-outline-info" style="cursor: default">{{$ticket->status}}</button>
                        </td>
                        <td>{{$ticket->ticket_by->name}}<span class="text-info">({{\App\Ticket::where('ticket_by_id',$ticket->ticket_by->id)->count()}})</span>
                        </td>
                        <td>{{$ticket->assigned_to->name}}</td>
                        <td>
                            @foreach($ticket->log as $log)
                                {{$log->message}}<br>
                            @endforeach
                        </td>
                        <td>
                            <button onclick="deleteTicket({{$ticket->id}})" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
                            <button onclick="location.href = '{{route('ticket.edit',['ticket'=>$ticket->id])}}'"
                                    class="btn btn-outline-info"><i class="ti ti-pencil"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deleteTicket(id) {
            if (confirm('Are you sure to delete this ticket?')) {
                url = '{{url('ticket').'/ticket_id'}}';
                url = url.replace('ticket_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Ticket Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete Ticket');
                    }
                })
            }
        }
    </script>
@endpush
