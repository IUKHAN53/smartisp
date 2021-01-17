<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Mikrotik</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="customer/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new MikroTik</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Customer Type</th>
                        <th>Zone</th>
                        <th>Mikrotik</th>
                        <th>Connection Type</th>
                        <th>Queue</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>





















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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/customer/create.blade.php ENDPATH**/ ?>
