<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header ">
                    <h2>Purchase Order</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('purchase.store')); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="form-body">
                            <h3 class="box-title">Product Info</h3>
                            <hr class="m-t-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Product</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="product"
                                                    data-placeholder="Select a Product" tabindex="1" required>
                                                <option value="">--Select a Product--</option>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Brand</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="brand"
                                                    data-placeholder="Select a Brand" tabindex="1" required>
                                                <option value="">--Select a Brand--</option>
                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Vendor</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="vendor"
                                                    data-placeholder="Select a Vendor" tabindex="1" required>
                                                <option value="">--Select a Vendor--</option>
                                                <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Purchase By</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" name="purchaser"
                                                    data-placeholder="Select a User" tabindex="1" required>
                                                <option value="">--Select a User--</option>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Date of Purchase</label>
                                        <div class="col-md-9">
                                            <input type="date" name="date" class="form-control"
                                                   placeholder="<?php echo date("Y-m-d"); ?>"
                                                   value="<?php echo date("Y-m-d"); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Lifetime (In
                                            Months)</label>
                                        <div class="col-md-9">
                                            <input type="number" name="lifetime" class="form-control"
                                                   placeholder="Enter Lifetime(i.e: 24)" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h3 class="box-title">Payment Method</h3>
                            <hr class="m-t-0">
                            <div  class="alert alert-danger d-none" id="errorBox">
                                <ul id="errorMsg" ></ul>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Asset Account</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" id="debit" name="d_account"
                                                    data-placeholder="Select an Account" tabindex="1" required>
                                                <option value="">--Select Asset Account--</option>
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Payment Accounts</label>
                                        <div class="col-md-9">
                                            <select class="form-control custom-select" id="credit" name="c_account"
                                                    data-placeholder="Select an Account" tabindex="1" required>
                                                <option value="">--Select Payment Accounts--</option>
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="box-title">Purchase Info</h3>
                            <hr class="m-t-0">
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Warranty(in Months)</label>
                                        <div class="col-md-9">
                                            <input type="number" onkeypress="return event.charCode >= 48" min="1"
                                                   name="warranty" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Price Per Piece</label>
                                        <div class="col-md-9">
                                            <input type="number" id="val2" onkeypress="return event.charCode >= 48"
                                                   min="1" name="price" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Total Quantity</label>
                                        <div class="col-md-9">
                                            <input type="number" id="val1" onkeypress="return event.charCode >= 48"
                                                   min="1" name="quantity" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Paid Amount</label>
                                        <div class="col-md-9">
                                            <input type="number" onkeypress="return event.charCode >= 48" min="0"
                                                   name="paid" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <hr class="m-t-0">
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-11">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-2">Total Amount</label>
                                        <div class="col-md-10">
                                            <input type="number" id="total" name="total" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" id="subBtn" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-inverse">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('scripts'); ?>
            <script>
                $("#val1 , #val2").change(function () {
                    const val1 = $('#val1').val();
                    const val2 = $('#val2').val();
                    var total = val1 * val2;
                    $('#total').val(total);
                });
                $("#credit , #debit").change(function () {
                    const credit = $('#credit').val();
                    const debit = $('#debit').val();
                    if(credit == debit){
                        $('#errorBox').removeClass('d-none');
                        $('#subBtn').addClass('d-none');
                        $('#errorMsg').text('Credit and Debit account cannot be same')
                    }
                    else{
                        $('#errorBox').addClass('d-none');
                        $('#subBtn').removeClass('d-none');
                    }
                });
            </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iukha\Documents\Active Projects\smartisp\resources\views/inventory/purchase_order/create.blade.php ENDPATH**/ ?>