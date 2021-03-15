<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Leave Management</h2>
                    </div>
                </div>
                <button class="btn btn-outline-success mr-1" onclick="location.href = '<?php echo e(route('leave.create')); ?>'"><i
                        class="fas fa-plus"></i> Add New Leave
                </button>
            </div>
        </div>

        <table class="table table-bordered" id="my_table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Start</th>
                <th>End</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($leave->id); ?></td>
                    <td><?php echo e($leave->employee->user->name); ?></td>
                    <td><?php echo e($leave->start); ?></td>
                    <td><?php echo e($leave->end); ?></td>
                    <td><?php echo e($leave->description); ?></td>
                    <td>
                        <button onclick="deleteLeave(<?php echo e($leave->id); ?>)" class="btn btn-outline-danger"><i
                                class="ti ti-trash"></i></button>


                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function deleteLeave(id) {
            if (confirm('Are you sure to delete this ticket?')) {
                url = '<?php echo e(url('leave').'/leave_id'); ?>';
                url = url.replace('leave_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Leave Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete Leave');
                    }
                })
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/hrm/leave/index.blade.php ENDPATH**/ ?>