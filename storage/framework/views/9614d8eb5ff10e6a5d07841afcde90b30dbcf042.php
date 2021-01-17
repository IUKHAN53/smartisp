<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new Mikrotik</h4>
                <h6 class="card-subtitle"> Add a new mikrotik for <?php echo e(Auth::user()->name); ?> </h6>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('mikrotik.store')); ?>" id="user_form" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">MikroTik Identity</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="identity" placeholder="Enter MikroTik Identity">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">MikroTik IP</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="host" placeholder="xx:xx:xx:xx">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputPassword1">API User Name</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputPassword1">API User Password </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">API Port</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="port" aria-describedby="emailHelp" placeholder="Default Port 8728">
                    </div>
                    <div class="form-group">
                        <span style="color: red;">*</span><label for="exampleInputEmail1">Site Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="sitename" aria-describedby="emailHelp" placeholder="Enter Site Name">
                    </div>
                    <div class="form-group">php
                        <span style="color: red;">*</span><label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="address" aria-describedby="emailHelp" placeholder="Enter Address">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/mikrotik/create.blade.php ENDPATH**/ ?>