<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Profiles</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="package/create" role="button" title="" data-toggle="tooltip"
                   data-original-title="Add"><i class="ti-plus"></i>Add new Package</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Synonym</th>
                        <th>Local Address</th>
                        <th>Remote Address</th>
                        <th>Rate-Limit</th>
                        <th>Only One</th>
                        <th>DNS Server</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->id); ?></td>
                            <td><?php echo e($value->name); ?></td>
                            <td>
                                <?php if($value->synonym != ''): ?>
                                    <?php echo e($value->synonym); ?>

                                <?php else: ?>
                                    <form method="POST" action="<?php echo e(route('set_synonym',$value->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="input-group mb-3">
                                            <input type="text" name="syn" class="form-control"
                                                   placeholder="Set New Synonym" aria-label="Recipient's username"
                                                   aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-info" type="button"
                                                        onclick="submit()">set
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($value->localAddress); ?></td>
                            <td><?php echo e($value->remoteAddress); ?></td>
                            <td><?php echo e($value->rateLimit); ?></td>
                            <td><?php echo e($value->onlyOne); ?></td>
                            <td><?php echo e($value->dns); ?></td>
                            <td>
                                <a class="btn btn-outline-cyan" role="button"
                                   href="<?php echo e(route('package.edit',$value->id)); ?>" title="" data-toggle="tooltip"
                                   data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smartisp\resources\views/package/index.blade.php ENDPATH**/ ?>