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
        <h4 class="card-title">All Mikrotik</h4>
        <div class="float-right">
        <a class="btn btn-outline-info" href="mikrotik/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new MikroTik</a>
        </div>
            <div class="table-responsive">
            <table class="table color-bordered-table dark-bordered-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>MikroTik Identity</th>
                    <th>MikroTik IP</th>
                    <th>API User Name</th>
                    <th>API Port</th>
                    <th>Status</th>
                    <th>Site Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $mikrotik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($mik->id); ?></td>
                    <td><?php echo e($mik->identity); ?></td>
                    <td><?php echo e($mik->host); ?></td>
                    <td><?php echo e($mik->username); ?></td>
                    <td><?php echo e($mik->port); ?></td>
                    <td>
                        <?php if($mik->status == 'online'): ?>
                            <i class="fas fa-circle" style="color:limegreen;font-size: 1.5em;">
                        <?php else: ?>
                            <i class="fas fa-circle" style="color:red;font-size: 1.5em;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($mik->sitename); ?></td>
                    <td>
                        <form id="delete_form" action="<?php echo e(route('mikrotik.destroy', $mik->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                        <a class="btn btn-outline-cyan" role="button" title="" data-toggle="tooltip" data-original-title="Add Customer"><i class="ti-plus"></i></a>
                        <a class="btn btn-outline-cyan" role="button"href="<?php echo e(route('mikrotik.edit',$mik->id)); ?>" title="" data-toggle="tooltip" data-original-title="Edit Network"><i class="ti-pencil"></i></a>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smartisp\resources\views/mikrotik/index.blade.php ENDPATH**/ ?>