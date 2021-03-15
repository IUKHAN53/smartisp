<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 margin-tb">
                    <div class="pull-left">
                        <h2>Department Management</h2>
                    </div>
                </div>
                <div class="btn-toolbar col-lg-2" role="toolbar" aria-label="Basic example">
                    <button onclick="newDepartment()" class="btn btn-outline-success mr-1" data-toggle="modal" data-target="#newdepartmentModal"><i
                            class="fas fa-plus"></i> Add New Department
                    </button>
                </div>
            </div>

            <table class="table table-bordered" id="my_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Created At</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($department->id); ?></td>
                        <td><?php echo e($department->name); ?></td>
                        <td><?php echo e($department->created_at); ?></td>
                        <td>
                            <button onclick="deleteTicket(<?php echo e($department->id); ?>)" class="btn btn-outline-danger"><i
                                    class="ti ti-trash"></i></button>
                            <button onclick="setDepartments(<?php echo e($department->id); ?>,'<?php echo e($department->name); ?>')" data-toggle="modal"
                                    data-target="#newdepartmentModal"
                                    class="btn btn-outline-info"><i class="ti ti-pencil"></i></button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>


    
    <div class="modal fade" id="newdepartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('department.store')); ?>" id="department_form" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" id="pos_id" name="pos_id" hidden>

                        <div class="form-group">
                            <label for="name" class="col-form-label">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="$('#department_form').submit()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>


        function setDepartments(id, name) {
            $('#name').val(name)
            $('#pos_id').val(id)
        }

        function newDepartment() {
            $('#name').val('')
        }

        function deleteTicket(id) {
            if (confirm('Are you sure to delete this department?')) {
                url = '<?php echo e(url('department').'/department_id'); ?>';
                url = url.replace('department_id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function () {
                        toastr.success('Deleted department Successfully');
                        location.reload();
                    },
                    error: function () {
                        toastr.error('Failed to delete department');
                    }
                })
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/hrm/department/index.blade.php ENDPATH**/ ?>