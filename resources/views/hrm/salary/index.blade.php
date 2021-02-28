@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Salary Management</h2>
                    </div>
                </div>
                <div class="btn-toolbar col-lg-2" role="toolbar" aria-label="Basic example">
                    <button class="btn btn-outline-success mr-1"
                            onclick="location.href = '{{ route('salary.create') }}'"><i
                            class="fas fa-plus"></i>Make new Salary
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Salary Year-Month</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($salaries as $salary)
                    <tr>
                        <td>{{$salary->employee->user->name}}</td>
                        <td>{{$salary->salary_for}}</td>
                        <td>{{$salary->salary}}</td>
                        <td>{{$salary->status}}</td>
                        <td>
                            <button onclick="deleteTicket({{$salary->id}})" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
                            <button onclick="location.href = '{{route('salary.edit',['salary'=>$salary->id])}}'"
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
            if (confirm('Are you sure to delete this Salary ?')) {
                url = '{{url('salary').'/salary_id'}}';
                url = url.replace('salary_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Salary Successfully');
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
