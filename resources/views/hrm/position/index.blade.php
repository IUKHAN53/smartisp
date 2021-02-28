@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Position Management</h2>
                    </div>
                </div>
                <div class="btn-toolbar col-lg-2" role="toolbar" aria-label="Basic example">
                    <button onclick="newPosition()" class="btn btn-outline-success mr-1" data-toggle="modal" data-target="#newPositionModal"><i
                            class="fas fa-plus"></i> Add New Position
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Position Name</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>{{$position->id}}</td>
                        <td>{{$position->name}}</td>
                        <td>{{$position->created_at}}</td>
                        <td>
                            <button onclick="deleteTicket({{$position->id}})" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
                            <button onclick="setPositions({{$position->id}},'{{$position->name}}')" data-toggle="modal"
                                    data-target="#newPositionModal"
                                    class="btn btn-outline-info"><i class="ti ti-pencil"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{--    Modals--}}
    <div class="modal fade" id="newPositionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('position.store')}}" id="position_form" method="POST">
                        @csrf
                        <input type="text" id="pos_id" name="pos_id" hidden>

                        <div class="form-group">
                            <label for="name" class="col-form-label">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="$('#position_form').submit()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>


        function setPositions(id, name) {
            $('#name').val(name)
            $('#pos_id').val(id)
        }

        function newPosition() {
            $('#name').val('')
        }

        function deleteTicket(id) {
            if (confirm('Are you sure to delete this position?')) {
                url = '{{url('position').'/position_id'}}';
                url = url.replace('position_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Position Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete Position');
                    }
                })
            }
        }
    </script>
@endpush
