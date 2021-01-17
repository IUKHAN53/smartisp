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
    <div class="card m-4">
        <div class="card-body">
            <form action="/journals/search" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-9">
                        <div class="input-group input-daterange">
                            <input type="date" class="form-control " name="from" value="<?php echo date('Y-m-d'); ?>" required>
                            <div class="input-group-addon">
                                <button class="btn-lg btn-info border-0">To</button>
                            </div>
                            <input type="date" class="form-control " name="to" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn-lg btn-primary">View Journals</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-body">
            <div class="table-responsive table-bordered">
                <table class="table color-bordered-table muted-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Transaction Date</th>
                        <th>Accounts Name</th>
                        <th>Dr. Amount</th>
                        <th>Cr. Amount</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($count)): ?>
                        <?php for($i = 1; $i<=$count; $i++): ?>
                            <?php switch($colors):
                                case (1): ?>
                                <?php $class = 'table-success ' ?>
                                <?php break; ?>
                                <?php case (2): ?>
                                <?php $class = 'table-info' ?>
                                <?php break; ?>
                            <?php endswitch; ?>
                            <?php $x = true; ?>
                            <?php $__currentLoopData = $entries->where('journal_number',$i); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($class); ?>">
                                    <?php if($x): ?>
                                        <td rowspan="<?php echo e(count($entries->where('journal_number',$i))); ?>"><?php echo e($i); ?></td>
                                        <td rowspan="<?php echo e(count($entries->where('journal_number',$i))); ?>">
                                            <?php echo e($e->date); ?></br>
                                            <span class="small text-info"><?php echo e($e->notes); ?></span>
                                        </td>
                                        <?php $x = false; ?>
                                    <?php endif; ?>
                                    <td><?php echo e(\App\Account::find($e->account_id)->name); ?></td>
                                    <?php if($e->type === 'd'): ?>
                                        <td>Dr.</td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>
                                    <?php if($e->type === 'c'): ?>
                                        <td>Cr.</td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>
                                    <td><?php echo e($e->amount); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($colors < 2): ?>
                                <?php $colors++ ?>
                            <?php else: ?>
                                <?php $colors = 1 ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smartisp\resources\views/account/journals/index.blade.php ENDPATH**/ ?>