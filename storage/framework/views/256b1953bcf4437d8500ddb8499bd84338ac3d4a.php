<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Customer Billing List</h4>
            <div class="float-right">


            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="billing_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name<i class="fa fa-fw fa-sort"></i></th>
                        <th>Bill<i class="fa fa-fw fa-sort"></i></th>
                        <th>Package<i class="fa fa-fw fa-sort"></i></th>
                        <th>Mikrotik<i class="fa fa-fw fa-sort"></i></th>
                        <th>Total Paid<i class="fa fa-fw fa-sort"></i></th>
                        <th>Advance<i class="fa fa-fw fa-sort"></i></th>
                        <th>Pending Amount<i class="fa fa-fw fa-sort"></i></th>
                        <th>Expiry Date<i class="fa fa-fw fa-sort"></i></th>
                        <th>Last Payment Date<i class="fa fa-fw fa-sort"></i></th>
                        <th>Connection</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function changeDueDate(){
            var date = $( "#dueDate" ).val();
            var user_id = $("#dueDateUser").val();
            var expireDateArr = date.split("-");
            var expireDate = new Date(expireDateArr[2], expireDateArr[0], expireDateArr[1]);
            var todayDate = new Date();
            if (todayDate > expireDate) {
                throwError("Select a valid date !");
            }
            else{
                $.ajax({
                    type: "post",
                    url: "<?php echo e(url('/changeDate')); ?>",
                    data: {
                        _token: CSRF_TOKEN,
                        date :date,
                        user: user_id,
                    },
                    success: function (){
                        confirm("Date changed !");
                        update();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        };
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function update() {
            table.ajax.reload();
            $('#cancel-btn').click();
        }

        var table = $('#billing_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo e(url("/getbillings")); ?>',
            columns: [
                {data: 'id'},
                {data: 'full_name'},
                {data: 'monthly_bill'},
                {data: 'package'},
                {data: 'mikrotik'},
                {data: 'total_paid'},
                {data: 'advance'},
                {data: 'pending_amount'},
                {data: 'due_date'},
                {data: 'last_payment_date'},
                {data: 'connection'},
                {data: 'actions'},
            ]
        });
        $('body').on('click', '.deleteItem', function () {
            var Item_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "/product/" + Item_id,
                data: {_token: CSRF_TOKEN},
                success: update,
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SmartISP\resources\views/billing/index.blade.php ENDPATH**/ ?>