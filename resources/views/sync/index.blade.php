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
            <h4 class="card-title">Synchronise active Mikrotik With Database</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="{{url('/sync/all')}}" role="button" title="" data-toggle="tooltip"
                   data-original-title="Sync All"><i class="ti-plus"></i>Sync EveryThing</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>IP Pools</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/pool')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Hotspot</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/hotspot')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Hotspot Profiles</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/hotspotprofiles')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Hotspot Users</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/hotspotusers')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Queues</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/queues')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Queue Types</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/queuetypes')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>IP Addresses</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/ipaddresses')}}">Sync</a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Interfaces</td>
                        <td><a role="button" class="btn btn-outline-info" href="{{url('/sync/interfaces')}}">Sync</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
