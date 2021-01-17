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
            <h4 class="card-title">Synchronise active Mikrotik With Database</h4>
            <div class="float-right">
                <a class="btn btn-outline-info" href="/sync/all" role="button" title="" data-toggle="tooltip"
                   data-original-title="Sync All"><i class="ti-plus"></i>Sync EveryThing</a>
            </div>
            <div class="table-responsive">
                <table class="table color-bordered-table dark-bordered-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>IP Pools</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/pool">Sync</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Hotspot</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/hotspot">Sync</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Hotspot Profiles</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/hotspotprofiles">Sync</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Hotspot Users</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/hotspotusers">Sync</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Queues</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/queues">Sync</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Queue Types</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/queuetypes">Sync</a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>IP Addresses</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/ipaddresses">Sync</a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Interfaces</td>
                        <td><a role="button" class="btn btn-outline-info" href="/sync/interfaces">Sync</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\PhpstormProjects\smartisp\resources\views/sync/index.blade.php ENDPATH**/ ?>