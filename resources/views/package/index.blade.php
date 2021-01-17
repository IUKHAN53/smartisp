@extends('layouts.template')

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Profiles</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="package/create" role="button" title="" data-toggle="tooltip"
                   data-original-title="Add"><i class="ti-plus"></i>Add new Package</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Synonym</th>
                        <th>Local Address</th>
                        <th>Remote Address</th>
                        <th>Rate-Limit</th>
                        <th>Only One</th>
                        <th>DNS Server</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profile as $key=>$value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                @if($value->synonym != '')
                                    {{ $value->synonym }}
                                @else
                                    <form method="POST" action="{{route('set_synonym',$value->id)}}">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="syn" class="form-control"
                                                   placeholder="Set New Synonym" aria-label="Recipient's username"
                                                   aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-info" type="button"
                                                        onclick="submit()">set
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $value->localAddress }}</td>
                            <td>{{ $value->remoteAddress }}</td>
                            <td>{{ $value->rateLimit }}</td>
                            <td>{{ $value->onlyOne}}</td>
                            <td>{{ $value->dns }}</td>
                            <td>
                                <a class="btn btn-outline-cyan" role="button"
                                   href="{{ route('package.edit',$value->id)}}" title="" data-toggle="tooltip"
                                   data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
