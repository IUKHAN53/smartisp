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
                        <h2>Chart Of Accounts</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('chartofaccounts.create') }}"> Add New</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row m-3">

                <div class="col-md-4">
                    <div class="card border  text-center">
                        <div class="card-header"><h3>1</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Expense <span class="text-info small">1000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($data->where('type','expense') as $d)
                                <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                    {{$d->name}} <small class="text-info">{{$d->identifier}}</small>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>2</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Revenue <span class="text-info small">2000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($data->where('type','revenue') as $d)
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        {{$d->name}} <small class="text-info">{{$d->identifier}}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>3</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Asset <span class="text-info small">3000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($data->where('type','asset') as $d)
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        {{$d->name}} <small class="text-info">{{$d->identifier}}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>4</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Liability <span class="text-info small">4000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($data->where('type','liability') as $d)
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        {{$d->name}} <small class="text-info">{{$d->identifier}}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>5</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Equity <span class="text-info small">5000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($data->where('type','equity') as $d)
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        {{$d->name}} <small class="text-info">{{$d->identifier}}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
