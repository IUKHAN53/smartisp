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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Chart Of Accounts</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="<?php echo e(route('chartofaccounts.create')); ?>"> Add New</a>
                    </div>
                </div>
            </div>

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
            <div class="row m-3">

                <div class="col-md-4">
                    <div class="card border  text-center">
                        <div class="card-header"><h3>1</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Expense <span class="text-info small">1000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $data->where('type','expense'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                    <?php echo e($d->name); ?> <small class="text-info"><?php echo e($d->identifier); ?></small>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>2</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Revenue <span class="text-info small">2000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $data->where('type','revenue'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        <?php echo e($d->name); ?> <small class="text-info"><?php echo e($d->identifier); ?></small>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>3</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Asset <span class="text-info small">3000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $data->where('type','asset'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        <?php echo e($d->name); ?> <small class="text-info"><?php echo e($d->identifier); ?></small>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>4</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Liability <span class="text-info small">4000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $data->where('type','liability'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        <?php echo e($d->name); ?> <small class="text-info"><?php echo e($d->identifier); ?></small>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border text-center">
                        <div class="card-header"><h3>5</h3></div>
                        <div class="card-body">
                            <div class="card bg-primary p-3 text-center text-white">
                                <h2>Equity <span class="text-info small">5000</span></h2>
                                <footer>
                                    <h4>Master Type</h4>
                                </footer>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $data->where('type','equity'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item"><i class="ti-arrow-circle-right mr-3"></i>
                                        <?php echo e($d->name); ?> <small class="text-info"><?php echo e($d->identifier); ?></small>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smartisp\resources\views/account/chartofaccounts/index.blade.php ENDPATH**/ ?>