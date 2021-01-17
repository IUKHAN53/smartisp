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
    <h2 class="m-3">OLT List</h2>
    <div class="card m-3">
        <div class="card-body">

            <a href="/splitter" type="button" class="btn btn-outline-info"><i class="ti-list  mr-2"></i>Splitter List</a>
            <a href="/tjbox" type="button" class="btn btn-outline-info"><i class="ti-list mr-2"></i>TJ List</a>
            <a href="/optical/create" type="button" class="btn btn-outline-info"><i class="ti-plus mr-2"></i>Add OLT</a>
        </div>
    </div>
    <div class="card m-3">
        <div class="card-body">
            <h4 class="card-title">Franchise List</h4>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Total PON</th>
                        <th>ONU/PON</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $opticals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($o->brand); ?></td>
                            <td><?php echo e($o->model); ?></td>
                            <td><?php echo e($o->totalpon); ?></td>
                            <td><?php echo e($o->onuperpon); ?></td>
                            <td><?php echo e($o->address); ?></td>
                            <td>
                                <form id="delete_form" action="<?php echo e(route('optical.destroy', $o->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <a class="btn btn-outline-cyan" role="button"
                                   href="<?php echo e(route('optical.edit',$o->id)); ?>" title="" data-toggle="tooltip"
                                   data-original-title="Edit Network"><i class="ti-pencil"></i></a>
                                <a class="btn btn-outline-danger" role="button" onclick="del()" title=""
                                   data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/network/optical/create.blade.php ENDPATH**/ ?>
