@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">All Queues</h4>
        <div class="float-right">
        <a class="btn btn-outline-info" href="queue/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new Queue</a>
        </div>
            <div class="table-responsive">
            <table class="table color-bordered-table dark-bordered-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Target</th>
                    <th>Destination</th>
                    <th>Priority</th>
                    <th>Queue Type</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($queue as $q)
                    <tr>
                    <td>{{ $q->id }}</td>
                    <td>{{ $q->name }}</td>
                    <td>{{ $q->target }}</td>
                    <td>{{ $q->dst }}</td>
                    <td>{{ $q->priority }}</td>
                    <td>{{ $q->queue_type->name }}</td>
                    <td>{{ $q->comment }}</td>
                    <td>
                        <form id="delete_form" action="{{ route('queue.destroy', $q->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a class="btn btn-outline-cyan" role="button"href="{{ route('queue.edit',$q->id)}}" title="" data-toggle="tooltip" data-original-title="Edit Queue"><i class="ti-pencil"></i></a>
                        <a class="btn btn-outline-danger" role="button" onclick="del()" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }
    </script>
@endsection
