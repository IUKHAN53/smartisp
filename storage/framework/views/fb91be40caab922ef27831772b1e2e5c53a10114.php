<?php $__env->startSection('content'); ?>
    <div class="col-12 m-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add new User to Hotspot</h4>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('hotspotuser.store')); ?>" id="user_form" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="server"
                                name="server" >
                            <option value="">Select Server</option>
                            <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option id="option" value="<?php echo e($s['id']); ?>"><?php echo e($s['name']); ?>

                                    <small>(<?php echo e($s['profile']); ?>)</small></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="profile"
                                name="profile">
                            <option value="">Select Profile</option>
                            <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($s['synonym']==''): ?>
                                    <option id="option" value="<?php echo e($s['name']); ?>"><?php echo e($s['name']); ?></option>
                                <?php else: ?>
                                    <option id="option" value="<?php echo e($s['name']); ?>"><?php echo e($s['synonym']); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="timelimit" name="timelimit"
                                placeholder="Enter Time Limit">
                    </div>

                    <div class="input-group mb-4">
                        <input type="text" name="datalimit" class="form-control" aria-label="Text input with dropdown button" placeholder="Data Limit">
                        <div class="input-group-append">
                            <select class="custom-select form-control required" id="profile"
                                    name="size">
                                <option value="mb">MB</option>
                                <option value="gb">GB</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="comment" name="comment"
                               aria-describedby="emailHelp" placeholder="Enter Comments">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/hotspot/user/create.blade.php ENDPATH**/ ?>