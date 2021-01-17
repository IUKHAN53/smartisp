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
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Permission Management</h2>
                    </div>
                    <div class="pull-right">
                        @can('permission-create')
                            <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Permission</a>
                        @endcan
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($permissions as $key => $permission)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            @can('permission-list')
                                <a class="btn btn-info" href="{{ route('permission.show',$permission->id) }}">Show</a>
                            @endcan
                            @can('permission-edit')
                                <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
                            @endcan
                            @can('permission-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['permission.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
