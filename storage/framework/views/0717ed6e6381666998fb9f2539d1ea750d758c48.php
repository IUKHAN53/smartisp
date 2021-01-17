<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Role</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="<?php echo e(route('roles.index')); ?>"> Back</a>
                        </div>
                    </div>
                </div>


                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <?php echo Form::open(array('route' => 'roles.store','method'=>'POST')); ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong><br><br>
                            <div class="row">
                                <div class="col-xs-5 col-md-5">
                                    <h5><i class="fas fa-lock mr-2"></i>Available Permissions</h5>
                                    <select id="multiselect" class="form-control ms-selectable" size="8"
                                            multiple="multiple">
                                            <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>" class="ms-elem-selectable"> <?php echo e($value->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-xs-2 col-md-1 mt-5">
                                    <button type="button" id="multiselect_rightAll" class="btn btn-block btn-info"><i
                                            class="ti-angle-double-right"></i></button>
                                    <button type="button" id="multiselect_rightSelected" class="btn btn-block btn-info">
                                        <i class="ti-angle-right"></i></button>
                                    <button type="button" id="multiselect_leftSelected" class="btn btn-block btn-info">
                                        <i class="ti-angle-left"></i></button>
                                    <button type="button" id="multiselect_leftAll" class="btn btn-block btn-info"><i
                                            class="ti-angle-double-left"></i></button>
                                </div>

                                <div class="col-xs-5 col-md-5">
                                    <h5><i class="fas fa-lock-open mr-2"></i>Allowed Permissions</h5>
                                    <select name="to[]" id="multiselect_to" class="form-control" size="8"
                                            multiple="multiple"></select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $('#multiselect').multiselect();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/roles/create.blade.php ENDPATH**/ ?>