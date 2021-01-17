<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Office Used Product List</h4>
            <div class="float-right">
                <a class="btn btn-outline-info mb-1" href="<?php echo e(url('/product/office/create')); ?>"><i class="ti-plus"></i>Add Office Used Product</a>
            </div>

            <div class="table-responsive m-t-40">
                <table class="table table-bordered table-striped" id="products_tables">
                    <thead>
                    <tr>
                        <th># <i class="fa fa-fw fa-sort"></i></th>
                        <th>Product <i class="fa fa-fw fa-sort"></i></th>
                        <th>Quantity <i class="fa fa-fw fa-sort"></i></th>
                        <th>Category <i class="fa fa-fw fa-sort"></i></th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function update() {
            table.ajax.reload();
            $('#cancel-btn').click();
        }

        var table = $('#products_tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo e(url("/getproducts")); ?>',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'quantity'},
                {data: 'product_categories_id'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addproduct() {
            $.ajax({
                url: '<?php echo e(route('product.store')); ?>',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    franchise: $("#franchise").val(),
                    products: $("#products").val(),
                    comments: $("#comments").val()
                },
                success: update,
                error: function (request, status, error) {
                    console.log(error)
                }
            })
        }

        $('body').on('click', '.deleteItem', function () {
            var Item_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: <?php echo e(url("/product/")); ?>+ '/'+ Item_id,
                data: {_token: CSRF_TOKEN},
                success: update,
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/inventory/product/office_products.blade.php ENDPATH**/ ?>