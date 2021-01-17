<?php $__env->startSection('content'); ?>
    <div class="col-12 m-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Multiple Users to Hotspot</h4>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="/hotspotuser/batch" id="user_form" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="qty" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="server"
                                name="server">
                            <option value="">Select Server</option>
                            <?php $__currentLoopData = $servers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option id="option" value="<?php echo e($s['name']); ?>"><?php echo e($s['name']); ?>

                                    <small>(<?php echo e($s['profile']); ?>)</small></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="server"
                                name="user">
                            <option value="">User Mode</option>
                            <option value="up">Username & Password</option>
                            <option value="vc">Username = Password</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="length"
                                name="userl">
                            <option value="">Name Length</option>
                            <?php for($i = 4; $i < 9; $i++): ?>
                                <option value=<?php echo e($i); ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prefix" name="prefix" placeholder="Prefix">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="character"
                                name="char">
                            <option value="">Character</option>
                            <option value="lower">abcd</option>
                            <option value="upper">ABCD</option>
                            <option value="upplow">aBcD</option>
                            <option value="lower">abcd2345</option>
                            <option value="upper">ABCD2345</option>
                            <option value="upplow">aBcD2345</option>
                            <option value="mix">5ab2c34d</option>
                            <option value="mix1">5AB2C34D</option>
                            <option value="mix2">5aB2c34D</option>
                            <option value="num">123..</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control required" id="profile"
                                name="profile">
                            <option value="">Select Profile</option>
                            <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p['name']); ?>"><?php echo e($p['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="timelimit" name="timelimit"
                               placeholder="Enter Time Limit">
                    </div>

                    <div class="input-group mb-4">
                        <input type="number" name="datalimit" class="form-control"
                               aria-label="Text input with dropdown button" placeholder="Data Limit">
                        <div class="input-group-append">
                            <select class="custom-select form-control required"
                                    name="mbgb">
                                <option value="1048576">MB</option>
                                <option value="1073741824">GB</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="comment" name="adcomment"
                               aria-describedby="emailHelp" placeholder="Enter Comments">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/hotspot/user/batch_create.blade.php ENDPATH**/ ?>