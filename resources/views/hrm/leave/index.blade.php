@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Leave Management</h2>
                    </div>
                </div>
                <button class="btn btn-outline-success mr-1" onclick="location.href = '{{ route('leave.create') }}'"><i
                        class="fas fa-plus"></i> Add New Leave
                </button>
            </div>
        </div>

        <table class="table table-bordered" id="my_table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Start</th>
                <th>End</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($leaves as $leave)
                <tr>
                    <td>{{$leave->id}}</td>
                    <td>{{$leave->employee->user->name}}</td>
                    <td>{{$leave->start}}</td>
                    <td>{{$leave->end}}</td>
                    <td>{{$leave->description}}</td>
                    <td>
                        <button onclick="deleteLeave({{$leave->id}})" class="btn btn-outline-danger"><i
                                class="ti ti-trash"></i></button>
{{--                        <button onclick="location.href = '{{route('leave.edit',['leave'=>$leave->id])}}'"--}}
{{--                                class="btn btn-outline-info"><i class="ti ti-pencil"></i></button>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deleteLeave(id) {
            if (confirm('Are you sure to delete this ticket?')) {
                url = '{{url('leave').'/leave_id'}}';
                url = url.replace('leave_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Leave Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete Leave');
                    }
                })
            }
        }
    </script>
@endpush
