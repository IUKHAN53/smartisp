@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Ticket Categories</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('ticket-category.create') }}"> Add New Category</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <button onclick="deleteCategory({{$category->id}})" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
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
        function deleteCategory(id) {
            if (confirm('Are you sure to delete this ticket?')) {
                url = '{{url('ticket-category').'/category_id'}}';
                url = url.replace('category_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function (data) {
                        if (data.status == 'failed') {
                            toastr.error(data.message);
                        } else {
                            toastr.success('Category Deleted Successfully');
                            location.reload();
                        }
                    },
                    error: function () {
                        toastr.error('Failed to delete ticket');
                    }
                })
            }
        }
    </script>
@endpush
