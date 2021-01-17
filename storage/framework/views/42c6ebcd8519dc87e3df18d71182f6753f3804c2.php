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
        <h4 class="card-header">Monitor Network</h4>
        <div class="card-body">
            <div class="card">
                <div class="card-title">
                    <h3>Server List</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="card border  align-items-center">
                                    <div class="card-block text-center">
                                        <h4 class="card-title"><i class="fas fa-server text-info"
                                                                  style="font-size: 60px"></i>
                                        </h4>
                                        <h4 class="card-text text-info"><?php echo e($d['server']->name); ?></h4>
                                        <h4 class="card-text text-info"><?php echo e($d['server']->ip); ?></h4>
                                        <?php if($d['status'] == 'online'): ?>
                                            <a class="card-text btn btn-success mb-1">UP</a><br>
                                        <?php else: ?>
                                            <a class="card-text btn btn-danger mb-1">Down</a><br>
                                        <?php endif; ?>
                                        <div class="card-text btn-group" role="group" aria-label="Actions">
                                            <button type="button" class="btn btn-outline-info">Details</button>
                                            <button type="button" class="btn btn-outline-success">Edit</button>
                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <a type="button" class="align-self-end btn btn-outline-info" style="margin-top: auto;" href="/server/create">Add new Server</a>
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

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/network/server/create.blade.php ENDPATH**/ ?>
