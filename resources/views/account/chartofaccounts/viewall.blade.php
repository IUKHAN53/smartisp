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
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Ledger Accounts Number</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->type }}</td>
                    <td>{{ $d->identifier }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('chartofaccounts.show',$d->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('chartofaccounts.edit',$d->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['chartofaccounts.destroy', $d->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
@endsection
