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
    <div class="row">
        <div class="col-12">
            <!-- table responsive -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Responsive </h4>
                    <h6 class="card-subtitle">Data table example</h6>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address Pool</th>
                                <th>Shared Users</th>
                                <th>Rate-Limit</th>
                                <th>Parent Queue</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($p['id']); ?></td>
                                <td><?php echo e($p['name']); ?></td>
                                <td><?php echo e($p['address-pool']); ?></td>
                                <td><?php echo e($p['shared-user']); ?></td>
                                <td><?php echo e($p['rate-limit']); ?></td>
                                <td><?php echo e($p['parent-queue']); ?></td>
                                <td>
                                    <form id="delete_form" action="<?php echo e(route('hotspotprofile.destroy', $p->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>
                                    <a class="btn btn-outline-cyan" role="button"href="<?php echo e(route('hotspotprofile.edit',$p->id)); ?>" title="" data-toggle="tooltip" data-original-title="Edit Zone"><i class="ti-pencil"></i></a>
                                    <a class="btn btn-outline-danger" role="button" onclick="del()" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function del() {
            document.getElementById('delete_form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/hotspot/profile/create.blade.php ENDPATH**/ ?>
