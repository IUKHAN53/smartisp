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
                    <h4 class="card-title">Table Responsive </h4>
                    <h6 class="card-subtitle">Data table example</h6>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address Pool</th>
                                <th>Shared Users</th>
                                <th>Rate-Limit</th>
                                <th>Parent Queue</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($profiles as $p)
                            <tr>
                                <td>{{$p['id']}}</td>
                                <td>{{$p['name']}}</td>
                                <td>{{$p['address-pool']}}</td>
                                <td>{{$p['shared-user']}}</td>
                                <td>{{$p['rate-limit']}}</td>
                                <td>{{$p['parent-queue']}}</td>
                                <td>
                                    <form id="delete_form" action="{{ route('hotspotprofile.destroy', $p->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-outline-cyan" role="button"href="{{ route('hotspotprofile.edit',$p->id)}}" title="" data-toggle="tooltip" data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
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
