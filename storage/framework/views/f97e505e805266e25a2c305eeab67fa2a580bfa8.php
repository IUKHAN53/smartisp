<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Customer Type</h4>
                <h6 class="card-subtitle"> Add a new Customer Type </h6>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('customertype.store')); ?>" id="user_form" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="type">Customer Type</label>
                        <input type="text" class="form-control" id="type" name="type">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="details">Customer Details</label>
                        <input type="text" class="form-control" id="details" name="details" >
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/customer/addtype.blade.php ENDPATH**/ ?>