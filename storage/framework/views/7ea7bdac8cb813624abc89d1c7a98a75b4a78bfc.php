<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Payment</h4>
                <h6 class="card-subtitle">Make a new Payment For <?php echo e($user->full_name); ?></h6>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(url('billing/receivePayment')); ?>" id="paymentForm" method="POST" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span style="color: red;">*</span><label for="type">Payment Date</label>
                                <input type="date" class="form-control required" id="date" readonly name="date"
                                       value="<?php echo e(\Carbon\Carbon::now()); ?>">
                            </div>
                        </div>
                        <input type="text" name="customer_id" value="<?php echo e($user->reference_no); ?>" hidden>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span style="color: red;">*</span><label for="type">Monthly Bill</label>
                                <input type="text" class="form-control required" id="monthly_bill" name="monthly_bill"
                                       value="<?php echo e($user->billing->monthly_bill); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span style="color: red;">*</span><label for="type">Received From</label>
                                <input type="text" class="form-control required" id="received_from"
                                       name="received_from">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span style="color: red;">*</span><label for="type">Full Name</label>
                                <input type="text" class="form-control required" id="name" name="name"
                                       value="<?php echo e($user->full_name); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span style="color: red;">*</span><label for="type">Received By</label>
                                <input type="text" class="form-control required" id="received_by" name="received_by">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span style="color: red;">*</span><label for="type">Payment Method</label>
                                <select class="custom-select form-control required"
                                        id="kind"
                                        name="kind">
                                    <option>Select Method</option>
                                    <option value="bank">Bank Payment</option>
                                    <option value="cash">Cash Payment</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Summary</h4>
                    <div class="row justify-content-center">
                        <div class="table-responsive m-t-40 col-md-8">
                            <table class="table table-bordered ml-auto mr-auto">
                                <thead>
                                <tr>
                                    <td style="width:35%">Details</td>
                                    <td>Amount Info</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Amount Due</td>
                                    <td><input type="text" class="form-control required" id="due" name=""
                                               value="<?php echo e($user->billing->monthly_bill); ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td><input type="number" class="form-control required" id="discount" name="discount"
                                        value="<?php echo e($user->billing->perm_discount); ?>"></td>
                                </tr>
                                <tr>
                                    <td>Payable Amount</td>
                                    <td><input type="number" class="form-control required" id="payable" name="payable" readonly></td>
                                </tr>
                                <tr>
                                    <td>Received Amount</td>
                                    <td><input type="number" class="form-control required" id="received" name="received"></td>
                                </tr>
                                <tr>
                                    <td>Balance Due</td>
                                    <td><input type="number" class="form-control required" id="dueBalance" name="dueBalance" readonly></td>
                                </tr>
                                <tr>
                                    <td>Comment</td>
                                    <td><input type="text" class="form-control requirednumber" id="comment" name="comment"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Make Payment"/>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#discount').change(function (){
            var discount = $('#discount').val();
            var due = $('#due').val();
            $('#payable').val(due - discount);
        })
        $('#received').change(function (){
            var reveived = $('#received').val();
            var payable = $('#payable').val();
            $('#dueBalance').val(payable - reveived);
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/billing/payment.blade.php ENDPATH**/ ?>