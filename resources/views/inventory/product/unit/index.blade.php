@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product Unit</h4>
            <div class="float-right">
                <a class="btn btn-outline-info mb-1" href="#" role="button" title="" data-toggle="modal"
                   data-target="#exampleModal" data-original-title="Add"><i class="ti-plus"></i>Add new Unit</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <input id="unit" type="text" class="form-control" name="unit"
                                       placeholder="Unit name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancel-btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button"   class="btn btn-primary" onclick="addunit()">Add Unit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table" id="categoriesTables">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$d->name}}</td>
                            <td>
                                @if($d->status === 1)
                                    <input type="checkbox" class="js-switch" data-color="#2df65c" data-secondary-color="#f62d51" checked disabled/>
                                @else
                                    <input type="checkbox" class="js-switch" data-color="#2df65c" data-secondary-color="#f62d51" disabled/>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('productunit.show',$d->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('productunit.edit',$d->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['productunit.destroy', $d->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }

        function addunit() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{route('productunit.store')}}',
                type:'POST',
                data:{
                    _token: CSRF_TOKEN,
                    unit: $("#unit").val()
                },
                success: function (data) {
                    location.reload();
                },
                error: function (request, status, error){
                    console.log(error);
                }
            })
        }

    </script>
@endpush
