<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Salary Management</h2>
                    </div>
                </div>
                <div class="btn-toolbar col-lg-2" role="toolbar" aria-label="Basic example">
                    <button class="btn btn-outline-success mr-1"
                            onclick="location.href = '<?php echo e(route('salary.create')); ?>'"><i
                            class="fas fa-plus"></i>Make new Salary
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Salary Year-Month</th>
                    <th>Salary</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($salary->employee->user->name); ?></td>
                        <td><?php echo e($salary->salary_for); ?></td>
                        <td><?php echo e($salary->salary); ?></td>
                        <td><?php echo e($salary->status); ?></td>
                        <td>
                            <button onclick="deleteTicket(<?php echo e($salary->id); ?>)" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
                            <button onclick="location.href = '<?php echo e(route('salary.edit',['salary'=>$salary->id])); ?>'"
                                    class="btn btn-outline-info"><i class="ti ti-pencil"></i></button>
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
        function deleteTicket(id) {
            let url;
            if (confirm('Are you sure to delete this Salary ?')) {
                url = '<?php echo e(url('salary').'/salary_id'); ?>';
                url = url.replace('salary_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted Salary Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete Employee');
                    }
                })
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/hrm/salary/index.blade.php ENDPATH**/ ?>