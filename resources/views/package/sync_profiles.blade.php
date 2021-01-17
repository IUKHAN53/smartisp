@extends('layouts.template')

@section('content')
<div class="col-12">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Set Profile Details(Only For DataBase)</h4>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Set synonyms for Profiles</h2>
                    <form method="post" class="mt-4" action="/package/sync">
                    @csrf
                    @foreach($profile as $pr)
                        <h4 class="text-info">Name: <span class="text-success">{{ $pr['name']}}</span></h4><br>
                        <div class="form-group">
                        <input type="text" name="{{$pr['name']}}_synonym" placeholder="Synonym" class="form-control">
                        </div>
                            <div class="form-group">
                                <input type="text" name="{{$pr['name']}}_comment" placeholder="Description" class="form-control">
                                <input type="text" name="name"  value="{{$pr['name']}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_m_id"  value="{{$pr['.id']}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_name"  value="{{$pr['name']}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_loc_addr"  value="{{$pr['local-address'] ?? 'N/A'}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_rem_addr" value="{{$pr['remote-address'] ?? 'N/A'}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_onlyOne"  value="{{$pr['only-one']}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_rateLimit"  value="{{$pr['rate-limit'] ?? 'N/A'}}" class="form-control" hidden>
                                <input type="text" name="{{$pr['name']}}_dns" placeholder="Description" value="{{$pr['dns-server'] ?? 'N/A'}}" class="form-control" hidden>
                            </div>
                        @endforeach
                        <input type="text" name="total" value="{{count($profile)}}" hidden/>
                        <input type="submit" class="btn btn-primary" value="Save Changes"/>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
