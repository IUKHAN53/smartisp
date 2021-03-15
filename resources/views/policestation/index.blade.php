@extends('layouts.template')

@section('content')
    <div class="col-sm-12">

    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Police Stations</h4>

            <div class="table-responsive" >
                <table class="table color-bordered-table dark-bordered-table" id="my_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Name in Bengali</th>
                        <th>District</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ps as $p)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->bn_name }}</td>
                            <td>{{ \App\District::find($p->district_id)->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }
    </script>
@endsection
