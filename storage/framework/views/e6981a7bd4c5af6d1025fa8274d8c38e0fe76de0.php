<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <!-- table responsive -->
            <?php if(session('active')): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="card-title">DHCP Leases </h3>
                            <button class="btn-primary btn-rounded ml-4" onClick="window.location.reload();"><i
                                    class="fas fa-undo"></i></button>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table display table-bordered table-striped no-wrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Mac Address</th>
                                    <th>Server</th>
                                    <th>Active Address</th>
                                    <th>Active Mac Address</th>
                                    <th>Active Server</th>
                                    <th>Active Host Name</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $dhcp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($d['.id']); ?></td>
                                        <td><?php echo e($d['address']); ?></td>
                                        <td><?php echo e($d['mac-address']); ?></td>
                                        <td><?php echo e($d['server']); ?></td>
                                        <td><?php echo e($d['active-address']); ?></td>
                                        <td><?php echo e($d['active-mac-address']); ?></td>
                                        <td><?php echo e($d['active-server']); ?></td>
                                        <td><?php echo e($d['host-name']); ?></td>
                                        <td><?php echo e($d['status'] ?? 'N/A'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                Please Select Active Mikrotik
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/dhcp/create.blade.php ENDPATH**/ ?>
