@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Vendor List</h4>
            <div class="float-right">
                <a class="btn btn-outline-info mb-1" href="#" role="button" title="" data-toggle="modal"
                   data-target="#exampleModal" data-original-title="Add"><i class="ti-plus"></i>Add new Vendor</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new Vendor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-2">
                                <input id="name" type="text" class="form-control" name="name"
                                       placeholder="Vendor name">
                            </div>
                            <div class="input-group m-2">
                                <input id="address" type="text" class="form-control" name="address"
                                       placeholder="Vendor Address">
                            </div>
                            <div class="input-group m-2">
                                <input id="phone" type="text" class="form-control" name="phone"
                                       placeholder="Vendor Phone">
                            </div>
                            <div class="input-group m-2">
                                <input id="contact" type="text" class="form-control" name="contact"
                                       placeholder="Contact Person">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="addvendor()">Add Vendor</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive m-t-40">
                <table class="table table-bordered table-striped" id="products_tables">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Contact Person</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
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
         var table = $('#products_tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/getvendors',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'status'},
                {data: 'address'},
                {data: 'phone'},
                {data: 'contact_person'},
                {data: 'created_at'},
                {data: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        function addvendor(){
            $.ajax({
                url: '{{route('productvendor.store')}}',
                type:'POST',
                data:{
                    _token: CSRF_TOKEN,
                    name: $("#name").val(),
                    address: $("#address").val(),
                    phone: $("#phone").val(),
                    contact: $("#contact").val()
                },
                success: update,
                error: function (request, status, error){
                    console.log(error)
                }
            })
        }
        $('body').on('click', '.deleteItem', function () {
            var Item_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "/productvendor/"+Item_id,
                data:{_token: CSRF_TOKEN},
                success: update,
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
@endpush
