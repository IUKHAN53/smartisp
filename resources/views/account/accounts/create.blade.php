@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="card m-4">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Account</h2>
                        </div>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(array('route' => 'accounts.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Account's Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Account\'s Name','class' => 'form-control required')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Parent:</strong>
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="type" required>
                            <option>--Choose Parent--</option>
                            @foreach($data as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <button type="submit" class="btn btn-lg btn-info float-lg-right">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
