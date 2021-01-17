@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- table responsive -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h3 class="card-title">Hosts </h3>
                        <button class="btn-primary btn-rounded ml-4" onClick="window.location.reload();"><i class="fas fa-undo"></i></button>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Mac Address</th>
                                <th>Address</th>
                                <th>To Address</th>
                                <th>Server</th>
                                <th>UpTime</th>
                                <th>comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hosts as $h)
                            <tr>
                                <td>{{$h['.id']}}</td>
                                <td>{{$h['mac-address']}}</td>
                                <td>{{$h['address']}}</td>
                                <td>{{$h['to-address']}}</td>
                                <td>{{$h['server']}}</td>
                                <td>{{$h['uptime']}}</td>
                                <td>{{$h['comment'] ?? 'N/A'}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
