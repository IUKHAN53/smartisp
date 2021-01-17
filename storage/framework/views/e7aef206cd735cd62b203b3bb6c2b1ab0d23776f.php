<?php $__env->startSection('content'); ?>
    <div class="col-sm-12">
        <?php if($msg = session()->get('success')): ?>
            <script>
                Swal.fire('Good job!',
                    '<?php echo e($msg); ?>',
                    'success')
            </script>
        <?php endif; ?>
        <?php if($msg = session()->get('failed')): ?>
            <script>
                Swal.fire('Arghhh!',
                    '<?php echo e($msg); ?>',
                    'failed')
            </script>
        <?php endif; ?>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Product Categories</h4>
            <div class="float-right">
                <a class="btn btn-outline-info mb-1" href="#" role="button" title="" data-toggle="modal"
                   data-target="#exampleModal" data-original-title="Add"><i class="ti-plus"></i>Add new Category</a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <input id="category" type="text" class="form-control" name="category"
                                       placeholder="Category name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button"  id="cancel-btn" class="btn btn-primary" onclick="addcategory()">Add Category</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table" id="categoriesTables">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($d->name); ?></td>
                            <td>
                                <?php if($d->status === 1): ?>
                                    <input type="checkbox" class="js-switch" data-color="#2df65c" data-secondary-color="#f62d51" checked disabled/>
                                <?php else: ?>
                                    <input type="checkbox" class="js-switch" data-color="#2df65c" data-secondary-color="#f62d51" disabled/>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-info" href="<?php echo e(route('productcategory.show',$d->id)); ?>">Show</a>
                                <a class="btn btn-primary" href="<?php echo e(route('productcategory.edit',$d->id)); ?>">Edit</a>
                                <?php echo Form::open(['method' => 'DELETE','route' => ['productcategory.destroy', $d->id],'style'=>'display:inline']); ?>

                                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                                <?php echo Form::close(); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }

        function addcategory() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '<?php echo e(route('productcategory.store')); ?>',
                type:'POST',
                data:{
                    _token: CSRF_TOKEN,
                    category: $("#category").val()
                },
                success: function (data) {
                    console.log(data)
                    $('#cancel-btn').click();
                },
                error: function (request, status, error){
                    location.reload();
                    // $('#cancel-btn').click();
                }
            })
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/inventory/product/category/create.blade.php ENDPATH**/ ?>
