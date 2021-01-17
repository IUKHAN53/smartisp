<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Server</h4>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('createserver')); ?>" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <span style="color: red;">*</span><label >Name</label>
                        <input type="text" class="form-control required" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label>IP Address</label>
                        <input type="text" class="form-control required" name="ip" placeholder="XX:XX:XX:XX">
                    </div>
                    <input type="submit" class="btn btn-outline-info " value="Add Server"/>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/network/server/create.blade.php ENDPATH**/ ?>