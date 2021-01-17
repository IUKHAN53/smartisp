<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Zones</h4>
                <h6 class="card-subtitle"> Add new Zone </h6>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('zone.store')); ?>" id="user_form" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <span style="color: red;">*</span><label>Zone Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label >Zone Abbreviation</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="abbr" placeholder="Enter Abbreviation">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label>Franchise/POP Owner</label>
                        <input type="text" class="form-control" name="area_owner" id="exampleInputEmail1" placeholder="Owner">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputPassword1">Employee</label>
                        <input type="text" class="form-control" name="employee" id="exampleInputEmail1" placeholder="Employee">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/zone/create.blade.php ENDPATH**/ ?>