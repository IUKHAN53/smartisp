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
    <div class="row">
        <div class="col-12">
            <!-- table responsive -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hotspots</h4>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Interface</th>
                                <th>Profile</th>
                                <th>Idle-timeout</th>
                                <th>Keepalive-timeout</th>
                                <th>Login-timeout</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotspots as $h)
                            <tr>
                                <td>{{$h['id']}}</td>
                                <td>{{$h['name']}}</td>
                                <td>{{$h['interface']}}</td>
                                <td>{{$h['profile']}}</td>
                                <td>{{$h['idle-timeout']}}</td>
                                <td>{{$h['keepalive-timeout']}}</td>
                                <td>{{$h['login-timeout']}}</td>
                                <td>
                                    <form id="delete_form" action="{{ route('hotspot.destroy', $h->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-outline-cyan" role="button"href="{{ route('hotspot.edit',$h->id)}}" title="" data-toggle="tooltip" data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
                                    <a class="btn btn-outline-danger" role="button" onclick="del()" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }
    </script>
@endsection
