<?php $__env->startSection('content'); ?>
    <div class="col-12 pt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Billing</h4>
                <h6 class="card-subtitle"> Edit Billing Details</h6>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>





















                <h1>In Progress</h1>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\SmartISP\resources\views/billing/edit.blade.php ENDPATH**/ ?>