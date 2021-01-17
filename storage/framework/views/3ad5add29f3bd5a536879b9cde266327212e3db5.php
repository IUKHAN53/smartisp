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
                        <h2>Account List</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="<?php echo e(route('accounts.create')); ?>"> Add New</a>
                    </div>
                </div>
            </div>

            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Accounts Name</th>
                        <th>Accounts Type</th>
                        <th>Parent</th>
                        <th width="280px">Action</th>
                    </tr>
                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($account->name); ?></td>
                            <td><?php echo e(\App\Chartofaccount::findorFail($account->chartofaccounts_id)->name); ?></td>
                            <td><?php echo e(\App\Chartofaccount::find($account->chartofaccounts_id)->type); ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo e(route('accounts.show',$account->id)); ?>">Show</a>
                                <a class="btn btn-primary" href="<?php echo e(route('accounts.edit',$account->id)); ?>">Edit</a>
                                <?php echo Form::open(['method' => 'DELETE','route' => ['accounts.destroy', $account->id],'style'=>'display:inline']); ?>

                                <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                                <?php echo Form::close(); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/account/accounts/create.blade.php ENDPATH**/ ?>
