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
    <h2 class="m-3">OLT List</h2>
    <div class="card m-3">
        <div class="card-body">

            <a href="/splitter" type="button" class="btn btn-outline-info"><i class="ti-list  mr-2"></i>Splitter List</a>
            <a href="/tjbox" type="button" class="btn btn-outline-info"><i class="ti-list mr-2"></i>TJ List</a>
            <a href="/optical/create" type="button" class="btn btn-outline-info"><i class="ti-plus mr-2"></i>Add OLT</a>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-body">
            <h4 class="card-title">Franchise List</h4>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Total PON</th>
                        <th>ONU/PON</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($opticals as $o)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $o->brand }}</td>
                            <td>{{ $o->model }}</td>
                            <td>{{ $o->totalpon }}</td>
                            <td>{{ $o->onuperpon }}</td>
                            <td>{{ $o->address }}</td>
                            <td>
                                <form id="delete_form" action="{{ route('optical.destroy', $o->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a class="btn btn-outline-cyan" role="button"
                                   href="{{ route('optical.edit',$o->id)}}" title="" data-toggle="tooltip"
                                   data-original-title="Edit Network"><i class="ti-pencil"></i></a>
                                <a class="btn btn-outline-danger" role="button" onclick="del()" title=""
                                   data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
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
