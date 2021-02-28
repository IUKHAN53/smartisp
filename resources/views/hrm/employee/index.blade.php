@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Employee Management</h2>
                    </div>
                </div>
                <div class="btn-toolbar col-lg-2" role="toolbar" aria-label="Basic example">
                    <button class="btn btn-outline-success mr-1"
                            onclick="location.href = '{{ route('employee.create') }}'"><i
                            class="fas fa-plus"></i> Add New Employee
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>BirthDay</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->user->name}}</td>
                        <td>{{$employee->dob}}</td>
                        <td>{{$employee->age}}</td>
                        <td>{{$employee->position->name}}</td>
                        <td>
                            <button onclick="deleteTicket({{$employee->id}})" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
                            <button onclick="location.href = '{{route('employee.edit',['employee'=>$employee->id])}}'"
                                    class="btn btn-outline-info"><i class="ti ti-pencil"></i></button>
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
        function deleteTicket(id) {
            let url;
            if (confirm('Are you sure to delete this Employee ?')) {
                url = '{{url('employee').'/employee_id'}}';
                url = url.replace('employee_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Employee Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete Employee');
                    }
                })
            }
        }
    </script>
@endpush
