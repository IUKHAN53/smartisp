@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Customers List</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="customer/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new User</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table" id="customers_table">
                    <thead>
                    <tr>
                        <th>Reference Number <i class="fa fa-fw fa-sort"></i></th>
                        <th>Name <i class="fa fa-fw fa-sort"></i></th>
                        <th>Email <i class="fa fa-fw fa-sort"></i></th>
                        <th>Customer Type <i class="fa fa-fw fa-sort"></i></th>
                        <th>Mikrotik <i class="fa fa-fw fa-sort"></i></th>
                        <th>Package <i class="fa fa-fw fa-sort"></i></th>
                        <th>Zone <i class="fa fa-fw fa-sort"></i></th>
                        <th>Registration Date <i class="fa fa-fw fa-sort"></i></th>
                        <th>Status <i class="fa fa-fw fa-sort"></i></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function update(){
            table.ajax.reload();
            $('#cancel-btn').click();
        }
        var table = $('#customers_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url("/getcustomers")}}',
            columns: [
                {data: 'id'},
                {data: 'full_name'},
                {data: 'email'},
                {data: 'cust_type'},
                {data: 'mikrotik'},
                {data: 'package'},
                {data: 'zone'},
                {data: 'reg_date'},
                {data: 'status'},
            ]
        });
        $('body').on('click', '.deleteItem', function () {
            var Item_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "{{url('/customer/')}}"+'/'+Item_id,
                data:{_token: CSRF_TOKEN},
                success: update,
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
@endpush
