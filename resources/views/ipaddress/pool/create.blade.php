@extends('layouts.template')

@section('content')
    <div class="col-12 m-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new User to Hotspot</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('ippool.store')}}" id="user_form" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Server">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="ranges">Ranges</label>
                        <input type="text" class="form-control" id="ranges" name="ranges" placeholder="ranges">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
