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
            <h4 class="card-title">All IP Addresses</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="ipaddress/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new IP</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Address</th>
                        <th>Network</th>
                        <th>Interface</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $ip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ips): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($ips->id); ?></td>
                            <td><?php echo e($ips->address); ?></td>
                            <td><?php echo e($ips->network); ?></td>
                            <td><?php echo e($ips->interface); ?></td>
                            <td>
                                <form id="delete_form" action="<?php echo e(route('ipaddress.destroy', $ips->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <a class="btn btn-outline-cyan" role="button"href="<?php echo e(route('ipaddress.edit',$ips->id)); ?>" title="" data-toggle="tooltip" data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
                                <a class="btn btn-outline-danger" role="button" onclick="del()" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/ipaddress/create.blade.php ENDPATH**/ ?>
