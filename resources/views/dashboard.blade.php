@extends('layouts.template')

@section('content')
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
        </div>
        @if(isset($mkt))
            <div class="card">
                <div class="card-body">
                    <h4>Please Choose Active Mikrotik</h4><br>
                    <h4>or add a <a href="/mikrotik/create">new mikrotik</a></h4>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="ti-calendar" style="font-size: 2em;"></i>
                                </h3>
                            </div>
                            <div class="align-self-center m-l-20">
                                @foreach($clock as $c)
                                    <h4 class="m-b-0"><span class="text-info">Date:</span> {{$c['date']}}</h4>
                                    <h4 class="m-b-0"><span class="text-info">Time:</span> {{$c['time']}}</h4>
                                @endforeach
                                @foreach($resources as $res)
                                    <h4 class="m-b-0"><span class="text-info">UpTime: </span> {{$res['uptime']}}</h4>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-success">
                                <h3 class="text-white box m-b-0"><i class="ti-info-alt" style="font-size: 2em;"></i>
                                </h3>
                            </div>
                            <div class="align-self-center m-l-20">
                                @foreach($routerboard as $r)
                                    <h4 class="m-b-0"><span class="text-success">Board Name:</span> {{$r['board-name']}}
                                    </h4>
                                    <h4 class="m-b-0"><span class="text-success">Model:</span> {{$r['model']}}</h4>
                                    <h4 class="m-b-0"><span class="text-success">Router OS:</span> {{$res['version']}}
                                    </h4>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="d-flex flex-row">
                            <div class="p-10 bg-primary">
                                <h3 class="text-white box m-b-0"><i class="ti-server" style="font-size: 2em;"></i>
                                </h3>
                            </div>
                            <div class="align-self-center m-l-20">
                                @foreach($resources as $res)
                                    <h4 class="m-b-0"><span
                                            class="text-primary">CPU Load:   </span> {{$res['cpu-load']}} %
                                    </h4>
                                    <h4 class="m-b-0"><span
                                            class="text-primary">Free Memory:</span> {{((int)$res['free-memory'])/1000000}}
                                        MB
                                    </h4>
                                    <h4 class="m-b-0"><span
                                            class="text-primary">Free HDD:   </span> {{((int)$res['free-hdd-space'])/1000000}}
                                        MB
                                    </h4>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <i class="fas fa-wifi"></i> Hotspots
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-xlg-3">
                                <div class="card">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white">{{$total_active}}</h1>
                                        <h4 class="text-white"><i class="fas fa-wifi" style="font-size: 1.5em;"></i>
                                            Hotspot
                                            Active
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xlg-3">
                                <div class="card">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white">{{$total_users}}</h1>
                                        <h4 class="text-white"><i class="fas fa-users" style="font-size: 1.5em;"></i>
                                            Hotspot
                                            Users
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xlg-3">
                                <a href="/hotspotuser/create">
                                    <div class="card">
                                        <div class="box bg-warning text-center">
                                            <h1 class="font-light text-white"><i class="fas fa-user-plus"></i><span
                                                    class="font-16 font-weight-bold">Add</span></h1>
                                            <h4 class="text-white"><i class="fas fa-user" style="font-size: 1.5em;"></i>
                                                Hotspot
                                                User
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xlg-3">
                                <a href="/hotspotuser/batch">
                                    <div class="card">
                                        <div class="box bg-primary text-center">
                                            <h1 class="font-light text-white"><i class="fas fa-user-plus"></i><span
                                                    class="font-16 font-weight-bold">Generate</span></h1>
                                            <h4 class="text-white"><i class="fas fa-user" style="font-size: 1.5em;"></i>
                                                Hotspot
                                                User
                                            </h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar"></i> Traffic
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-list"></i> Hotspot Logs
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table color-bordered-table muted-bordered-table">
                                        <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>User(IP)</th>
                                            <th>Message</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($log->reverse() as $l)
                                            <tr>
                                                <td>{{$l['time']}}</td>
                                                <td>{{$l['user']}}</td>
                                                <td>{{$l['message']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <script>
            var n = 3000;
            function requestDatta(iface) {
                $.ajax({
                    url: './feestype/iface',
                    datatype: "json",
                    success: function (data) {
                        var midata = JSON.parse(data);
                        if (midata.length > 0) {
                            var TX = parseInt(midata[0].data);
                            var RX = parseInt(midata[1].data);
                            var x = (new Date()).getTime();
                            shift = chart.series[0].data.length > 19;
                            chart.series[0].addPoint([x, TX], true, shift);
                            chart.series[1].addPoint([x, RX], true, shift);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.error("Status: " + textStatus + " request: " + XMLHttpRequest);
                        console.error("Error: " + errorThrown);
                    }
                });
            }
        </script>
@endsection
