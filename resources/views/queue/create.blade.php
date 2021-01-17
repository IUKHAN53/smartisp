@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new Queue</h4>
                <h6 class="card-subtitle"> Add a Queue </h6>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('queue.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="remote_address"> Name : <span class="danger">*</span>
                        </label>
                        <input type="text" class="form-control required m-t-10"
                               id="name"
                               name="queue_name">
                    </div>
                    <div class="form-group">
                        <label for="remote_address"> Target : <span class="danger">*</span>
                        </label>
                        <input type="text" class="form-control required m-t-10"
                               id="target"
                               name="queue_ip">
                    </div>
                    <div class="form-group">
                        <label for="mikrotik"> Destination : <span class="danger">*</span> </label>
                        <select class="custom-select form-control required" id="mikrotik"
                                name="queue_dst">
                            <option value="">Select Destination</option>
                            @foreach($int as $i)
                                <option value="{{$i['name']}}">{{$i['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="priority"> Priority : <span class="danger">*</span>
                        </label>
                        <input type="text" class="form-control required m-t-10"
                               id="priority"
                               name="queue_priority">
                    </div>
                    <div class="form-group">
                        <label for="connection_type"> Queue Type : <span
                                class="danger">*</span>
                        </label>
                        <select class="custom-select form-control" id="queue_type"
                                name="queue_type">
                            <option value="">Select Queue Type</option>
                            @foreach($queue_type as $qt)
                                <option value="{{$qt['name']}}">{{$qt['name']}} ({{$qt['kind']}})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div id="queue_none" style="display: none">
                        <div class="form-group">
                            <label for="max_limit"> Max-limit : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required m-burst_limitt-10"
                                   id="max_limit"
                                   name="max_limit">
                        </div>
                        <div class="form-group">
                            <label for="burst_limit"> Burst-limit : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required m-t-10"
                                   id="burst_limit"
                                   name="burst_limit">
                        </div>
                        <div class="form-group">
                            <label for="burst_threshhold"> Burst-threshold : <span
                                    class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required m-t-10"
                                   id="burst_threshhold"
                                   name="burst_threshhold">
                        </div>
                        <div class="form-group">
                            <label for="burst_time"> Burst-time : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required m-t-10"
                                   id="burst_time"
                                   name="burst_time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment"> Comment : <span class="danger">*</span>
                        </label>
                        <input type="text" class="form-control required m-t-10"
                               id="comment"
                               name="queue_comment">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#queue_none').show();
            $('#queue_type').on('change', function (e) {
                let val = e.target.value;
                if (val === "") {
                    $('#queue_none').show();
                } else {
                    $('#queue_none').hide();
                }
            });
        })
    </script>
@endsection
