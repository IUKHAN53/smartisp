<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Purchase Orders</h4>
            <div class="float-right">
                <a class="btn btn-outline-info mb-1" href="<?php echo e(route('purchase.create')); ?>" role="button"><i class="ti-plus"></i>New Purchase Order</a>
            </div>

            <div class="table-responsive m-t-40">
                <table class="table table-bordered table-striped" id="purchase_table">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Vendor</th>
                        <th>Warranty</th>
                        <th>Total Amount</th>
                        <th>Purchase Date</th>
                        <th>Actions</th>
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

        function update(){
            table.ajax.reload();
        }
         var table = $('#purchase_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/getpurchase',
            columns: [
                {data: 'id'},
                {data: 'products_id'},
                {data: 'product_brands_id'},
                {data: 'quantity'},
                {data: 'product_vendors_id'},
                {data: 'warranty'},
                {data: 'total'},
                {data: 'purchase_date'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        $('body').on('click', '.deleteItem', function () {
            var Item_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "/purchase/"+Item_id,
                data:{_token: CSRF_TOKEN},
                success: update,
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/inventory/purchase_order/index.blade.php ENDPATH**/ ?>