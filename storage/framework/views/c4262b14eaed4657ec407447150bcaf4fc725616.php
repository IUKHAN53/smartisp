<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Optical Network Terminal</h4>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form class="form p-t-20" method="POST" action="<?php echo e(route('splitter.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputuname">OLT</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list"></i></span>
                                    </div>
                                    <select class="form-control custom-select" id="olt_select" name="olt">
                                        <option value="none">--Select OLT--</option>
                                        <?php $__currentLoopData = $olt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($o['id']); ?>"><?php echo e($o['brand']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputuname">OLT</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list"></i></span>
                                    </div>
                                    <select class="form-control custom-select" id="olt_select" name="pon">
                                        <option value="none">--Select OLT--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputuname">Parent Splitter</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ti-list-ol"></i></span>
                                    </div>
                                    <select class="form-control custom-select" name="parent">
                                        <option value="none">--Select Parent Splitter--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputuname">Splitter Name/Number</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-list"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Splitter Name/Number"
                                           name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputuname">Distance</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ti-list-ol"></i></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Enter Distance"
                                           name="distance" aria-label="onu"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputuname">Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ti-location-arrow"></i></span>
                                    </div>
                                    <textarea type="text" class="form-control" placeholder="Enter Address"
                                              name="address" aria-label="address"
                                              aria-describedby="basic-addon1">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            let olt = $('select[name=olt]')
            olt.change(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    url: '/getpon',
                    data: {olt: olt.val()},
                    type: 'post',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data)
                        var select = $('select[name= pon]');
                        select.empty();
                        for (i = 1; i <= data; i++) {
                            select.append('<option value=' + i + '>OLT' + olt.val() + '-PON' + i + '</option>');
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/network/splitter/create.blade.php ENDPATH**/ ?>