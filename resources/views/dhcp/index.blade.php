@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- table responsive -->
            @if(session('active'))
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="card-title">DHCP Leases </h3>
                            <button class="btn-primary btn-rounded ml-4" onClick="window.location.reload();"><i
                                    class="fas fa-undo"></i></button>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Mac Address</th>
                                    <th>Server</th>
                                    <th>Active Address</th>
                                    <th>Active Mac Address</th>
                                    <th>Active Server</th>
                                    <th>Active Host Name</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dhcp as $d)
                                    <tr>
                                        <td>{{$d['.id']}}</td>
                                        <td>{{$d['address']}}</td>
                                        <td>{{$d['mac-address']}}</td>
                                        <td>{{$d['server']}}</td>
                                        <td>{{$d['active-address']}}</td>
                                        <td>{{$d['active-mac-address']}}</td>
                                        <td>{{$d['active-server']}}</td>
                                        <td>{{$d['host-name']}}</td>
                                        <td>{{$d['status'] ?? 'N/A'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                Please Select Active Mikrotik
            @endif
        </div>
    </div>
@endsection
