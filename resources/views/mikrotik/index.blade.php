@extends('layouts.template')

@section('content')
<div class="col-sm-12">
    @if($msg = session()->get('success'))
        <script>
            Swal.fire('Good job!',
                '{{$msg}}',
                'success')
        </script>
    @endif
        @if($msg = session()->get('failed'))
            <script>
                Swal.fire('Arghhh!',
                    '{{$msg}}',
                    'failed')
            </script>
        @endif
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">All Mikrotik</h4>
        <div class="float-right">
        <a class="btn btn-outline-info" href="mikrotik/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new MikroTik</a>
        </div>
            <div class="table-responsive">
            <table class="table color-bordered-table dark-bordered-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>MikroTik Identity</th>
                    <th>MikroTik IP</th>
                    <th>API User Name</th>
                    <th>API Port</th>
                    <th>Status</th>
                    <th>Site Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($mikrotik as $mik)
                    <tr>
                    <td>{{ $mik->id }}</td>
                    <td>{{ $mik->identity }}</td>
                    <td>{{ $mik->host }}</td>
                    <td>{{ $mik->username }}</td>
                    <td>{{ $mik->port }}</td>
                    <td>
                        @if($mik->status == 'online')
                            <i class="fas fa-circle" style="color:limegreen;font-size: 1.5em;">
                        @else
                            <i class="fas fa-circle" style="color:red;font-size: 1.5em;">
                        @endif
                    </td>
                    <td>{{ $mik->sitename }}</td>
                    <td>
                        <form id="delete_form" action="{{ route('mikrotik.destroy', $mik->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a class="btn btn-outline-cyan" role="button" title="" data-toggle="tooltip" data-original-title="Add Customer"><i class="ti-plus"></i></a>
                        <a class="btn btn-outline-cyan" role="button"href="{{ route('mikrotik.edit',$mik->id)}}" title="" data-toggle="tooltip" data-original-title="Edit Network"><i class="ti-pencil"></i></a>
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
