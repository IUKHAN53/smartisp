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
            <h4 class="card-title">All Customer Types</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="customertype/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new type</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Type</th>
                        <th>Customer Details</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($type->id); ?></td>
                            <td><?php echo e($type->type); ?></td>
                            <td><?php echo e($type->details); ?></td>
                            <td>
                                <form id="delete_form" action="<?php echo e(route('customertype.destroy', $type->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <a class="btn btn-outline-cyan" role="button"href="<?php echo e(route('customertype.edit',$type->id)); ?>" title="" data-toggle="tooltip" data-original-title="Edit Network"><i class="ti-pencil"></i></a>
                                <a class="btn btn-outline-danger" role="button" onclick="del()" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/customer/viewtypes.blade.php ENDPATH**/ ?>