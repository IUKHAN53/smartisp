<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product Lists</h4>
            <div class="float-right">
                <a class="btn btn-outline-info mb-1" href="<?php echo e(url('/product/office')); ?>" role="button"><i class="ti-plus"></i>Office Products</a>
                <a class="btn btn-outline-info mb-1" href="#" role="button" title="" data-toggle="modal"
                   data-target="#exampleModal" data-original-title="Add"><i class="ti-plus"></i>Add new Product</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLabel">Add new Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-2">
                                <input id="name" type="text" class="form-control" name="name"
                                       placeholder="Product name">
                            </div>
                            <div class="input-group   m-2">
                                <select class="custom-select form-control required" id="category"
                                        name="category">
                                    <option value="">Select Product Category</option>
                                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c['id']); ?>"><?php echo e($c['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="input-group  m-2">
                                <select class="custom-select form-control required" id="unit"
                                        name="unit">
                                    <option value="">Select Product Unit</option>
                                    <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c['id']); ?>"><?php echo e($c['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="addproduct()">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive m-t-40">
                <table class="table table-bordered table-striped" id="products_tables">
                    <thead>
                    <tr>
                        <th>#<i class="fa fa-fw fa-sort"></i></th>
                        <th>Name<i class="fa fa-fw fa-sort"></i></th>
                        <th>Purchase Quantity<i class="fa fa-fw fa-sort"></i></th>
                        <th>Quantity in Stock<i class="fa fa-fw fa-sort"></i></th>
                        <th>Used<i class="fa fa-fw fa-sort"></i></th>
                        <th>Total Purchase Amount<i class="fa fa-fw fa-sort"></i></th>
                        <th>Category<i class="fa fa-fw fa-sort"></i></th>
                        <th>Unit<i class="fa fa-fw fa-sort"></i></th>
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

        function update(){
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
                {data: 'stock'},
                {data: 'used'},
                {data: 'purchase_amount'},
                {data: 'product_categories_id'},
                {data: 'product_units_id'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        function addproduct(){
            $.ajax({
                url: '<?php echo e(route('product.store')); ?>',
                type:'POST',
                data:{
                    _token: CSRF_TOKEN,
                    name: $("#name").val(),
                    category: $("#category").val(),
                    unit: $("#unit").val()
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
                url: "/product/"+Item_id,
                data:{_token: CSRF_TOKEN},
                success: update,
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/inventory/product/index.blade.php ENDPATH**/ ?>