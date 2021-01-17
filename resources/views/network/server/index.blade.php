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
        <h4 class="card-header">Monitor Network</h4>
        <div class="card-body">
            <div class="card">
                <div class="card-title">
                    <h3>Server List</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($data as $d)
                            <div class="col-md-3">
                                <div class="card border  align-items-center">
                                    <div class="card-block text-center">
                                        <h4 class="card-title"><i class="fas fa-server text-info"
                                                                  style="font-size: 60px"></i>
                                        </h4>
                                        <h4 class="card-text text-info">{{$d['server']->name}}</h4>
                                        <h4 class="card-text text-info">{{$d['server']->ip}}</h4>
                                        @if($d['status'] == 'online')
                                            <a class="card-text btn btn-success mb-1">UP</a><br>
                                        @else
                                            <a class="card-text btn btn-danger mb-1">Down</a><br>
                                        @endif
                                        <div class="card-text btn-group" role="group" aria-label="Actions">
                                            <button type="button" class="btn btn-outline-info">Details</button>
                                            <button type="button" class="btn btn-outline-success">Edit</button>
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <a type="button" class="align-self-end btn btn-outline-info" style="margin-top: auto;" href="/server/create">Add new Server</a>
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
