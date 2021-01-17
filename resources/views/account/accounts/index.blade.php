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
                        <h2>Account List</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('accounts.create') }}"> Add New</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Accounts Name</th>
                        <th>Accounts Type</th>
                        <th>Parent</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $account->name }}</td>
                            <td>{{ \App\Chartofaccount::findorFail($account->chartofaccounts_id)->name }}</td>
                            <td>{{ \App\Chartofaccount::find($account->chartofaccounts_id)->type }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('accounts.show',$account->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('accounts.edit',$account->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['accounts.destroy', $account->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection
