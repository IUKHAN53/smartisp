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
                        <h2>Users Management</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @can('user-edit')
                                <a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
                            @endcan
                            @can('user-edit')
                                <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
                            @endcan
                            @can('user-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
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
