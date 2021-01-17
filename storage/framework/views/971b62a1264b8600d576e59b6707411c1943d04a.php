<?php $__env->startSection('content'); ?>
    <div class="col-12 m-3">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Chart Of Account</h2>
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

                <?php echo Form::open(array('route' => 'chartofaccounts.store','method'=>'POST')); ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Type:</strong>
                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="type" required>
                            <option>--Select a type--</option>
                            <option value="expense">Expense</option>
                            <option value="revenue">Revenue</option>
                            <option value="asset">Asset</option>
                            <option value="liability">Liability</option>
                            <option value="equity">Equity</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <button type="submit" class="btn btn-lg btn-info float-lg-right">Submit</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smartisp\resources\views/account/chartofaccounts/create.blade.php ENDPATH**/ ?>