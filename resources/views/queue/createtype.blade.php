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
                <form action="{{route('queuetype.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control"
                               placeholder="Enter Name" id="name">
                    </div>

                    <div class="form-group">
                        <select class="custom-select form-control required" id="kind"
                                name="kind">
                            <option value="default">Select Kind</option>
                            <option value="bfifo">bfifo</option>
                            <option value="mq fifo">mq fifo</option>
                            <option value="none">none</option>
                            <option value="pcq">pcq</option>
                            <option value="pfifo">pfifo</option>
                            <option value="red">red</option>
                            <option value="sfq">sfq</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="pcq_rate" class="form-control"
                               placeholder="Enter pcq-rate" id="pcq-rate">
                    </div>

                    <div class="form-group">
                        <input type="text" name="pcq_burst_rate"
                               class="form-control"
                               placeholder="Enter pcq-burst-rate"
                               id="pcq-burst-rate">
                    </div>
                    <div class="form-group">
                        <input class="form-control"
                               name="pcq_burst_threshold"
                               placeholder="Enter pcq-burst-threshold"
                               id="pcq-burst-threshold">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="pcq_burst_time"
                               placeholder="Enter pcq-burst-time"
                               id="pcq-burst-time">
                    </div>
                    <div class="form-group">
                        <label for="rocket_no">pcq_classifier : </label>
                        <div class="switchery-demo m-b-30 row">
                            <div class="col-md-3">
                                <label for="rocket_no">dst-address: </label>
                                <input type="checkbox" name="dst" id="dst" checked class="js-switch"
                                       data-color="#26c6da"/>
                            </div>
                            <div class="col-md-3">
                                <label for="rocket_no">src-address: </label>
                                <input type="checkbox" name="src" id="src" checked class="js-switch"
                                       data-color="#26c6da"/>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add Type"/>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

        })
    </script>
@endsection
