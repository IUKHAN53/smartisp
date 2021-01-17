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
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Ledger Accounts Number</th>
                <th width="280px">Action</th>
            </tr>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($d->name); ?></td>
                    <td><?php echo e($d->type); ?></td>
                    <td><?php echo e($d->identifier); ?></td>
                    <td>
                        <a class="btn btn-info" href="<?php echo e(route('chartofaccounts.show',$d->id)); ?>">Show</a>
                        <a class="btn btn-primary" href="<?php echo e(route('chartofaccounts.edit',$d->id)); ?>">Edit</a>
                        <?php echo Form::open(['method' => 'DELETE','route' => ['chartofaccounts.destroy', $d->id],'style'=>'display:inline']); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/account/chartofaccounts/viewall.blade.php ENDPATH**/ ?>