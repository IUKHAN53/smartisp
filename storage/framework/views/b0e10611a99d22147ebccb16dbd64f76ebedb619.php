<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">All Queues</h4>
        <div class="float-right">
        <a class="btn btn-outline-info" href="queue/create" role="button" title="" data-toggle="tooltip" data-original-title="Add"><i class="ti-plus"></i>Add new Queue</a>
        </div>
            <div class="table-responsive">
            <table class="table color-bordered-table dark-bordered-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Target</th>
                    <th>Destination</th>
                    <th>Priority</th>
                    <th>Queue Type</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $queue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($q->id); ?></td>
                    <td><?php echo e($q->name); ?></td>
                    <td><?php echo e($q->target); ?></td>
                    <td><?php echo e($q->dst); ?></td>
                    <td><?php echo e($q->priority); ?></td>
                    <td><?php echo e($q->queue_type->name); ?></td>
                    <td><?php echo e($q->comment); ?></td>
                    <td>
                        <form id="delete_form" action="<?php echo e(route('queue.destroy', $q->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                        <a class="btn btn-outline-cyan" role="button"href="<?php echo e(route('queue.edit',$q->id)); ?>" title="" data-toggle="tooltip" data-original-title="Edit Queue"><i class="ti-pencil"></i></a>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/queue/create.blade.php ENDPATH**/ ?>
