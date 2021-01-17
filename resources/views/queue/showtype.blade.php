@extends('layouts.template')

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">All Queue Types</h4>
        <div class="float-right">
        <a class="btn btn-outline-info" href="queuetype/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new Queue Type</a>
        </div>
            <div class="table-responsive">
            <table class="table color-bordered-table dark-bordered-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Kind</th>
                    <th>pcq-rate</th>
                    <th>pcq-burst-rate</th>
                    <th>pcq-burst-threshold</th>
                    <th>pcq-burst-time</th>
                    <th>pcq-classifier</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($types as $q)
                    <tr>
                    <td>{{ $q->id }}</td>
                    <td>{{ $q->name }}</td>
                    <td>{{ $q->kind }}</td>
                    <td>{{ $q->pcq_rate }}</td>
                    <td>{{ $q->burst_rate }}</td>
                    <td>{{ $q->burst_threshold }}</td>
                    <td>{{ $q->burst_time }}</td>
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
