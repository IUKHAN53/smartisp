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
            <h4 class="card-title">All IP Addresses</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="ipaddress/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new IP</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Address</th>
                        <th>Network</th>
                        <th>Interface</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($ip as $ips)
                        <tr>
                            <td>{{ $ips->id }}</td>
                            <td>{{ $ips->address }}</td>
                            <td>{{ $ips->network }}</td>
                            <td>{{ $ips->interface }}</td>
                            <td>
                                <form id="delete_form" action="{{ route('ipaddress.destroy', $ips->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="btn btn-outline-cyan" role="button"href="{{ route('ipaddress.edit',$ips->id)}}" title="" data-toggle="tooltip" data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
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
