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
                    <h4 class="card-title">Hotspot Users </h4>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Server</th>
                                <th>Password</th>
                                <th>Profile</th>
                                <th>Time Limit</th>
                                <th>Data Limit</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td>{{$u['id']}}</td>
                                <td>{{$u['name']}}</td>
                                <td>{{\App\Hotspot::findOrFail($u['hotspot_id'])->name}}</td>
                                <td>{{$u['password']}}</td>
                                <td>{{$u['profile']}}</td>
                                <td>{{$u['limit-uptime']}}</td>
                                <td>{{$u['limit-bytes-total']}}</td>
                                <td>
                                    <form id="delete_form" action="{{ route('hotspotuser.destroy', $u->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-outline-cyan" role="button"href="{{ route('hotspotuser.edit',$u->id)}}" title="" data-toggle="tooltip" data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
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
