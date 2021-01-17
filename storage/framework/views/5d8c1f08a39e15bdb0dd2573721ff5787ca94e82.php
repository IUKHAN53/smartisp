<?php $__env->startSection('content'); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div>
                    <form action="<?php echo e(route('pop.store')); ?>" id="user_form" method="POST" class="form-horizontal">
                        <div class="form-body">
                            <?php echo csrf_field(); ?>
                            <div class="card">
                                <h3 class="box-title">Create Pop</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                   placeholder="Enter Username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="fname">pop Name</label>
                                            <input type="" class="form-control" id="fname" name="fname"
                                                   placeholder="pop Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="password">Confirm
                                                Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   id="password"
                                                   placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="phone">Mobile/ Help Line
                                                Number</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   aria-describedby="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="address">Permission
                                                Group</label>
                                            <select class="custom-select form-control required" id="permissiongroup"
                                                    name="permissiongroup">
                                                <option value="">Select Permission Group</option>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->name); ?>"><?php echo e($value->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                   aria-describedby="address" placeholder="Enter Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prefix">Prefix</label>
                                            <input type="text" class="form-control" id="prefix" name="prefix"
                                                   aria-describedby="prefix" placeholder="Add Prefix(Not Required)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3 class="box-title">Pop Network Area</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="address">Division
                                                Group</label>
                                            <select class="custom-select form-control required" id="division"
                                                    name="division">
                                                <option value="">Select Division</option>
                                                <option value="1">Placeholder</option>
                                                <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="option" value="<?php echo e($d['id']); ?>"><?php echo e($d['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="address">District
                                            </label>
                                            <select class="custom-select form-control required" id="district"
                                                    name="district">
                                                <option value="">Select District</option>
                                                <option value="1">Placeholder</option>
                                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="option" value="<?php echo e($d['id']); ?>"><?php echo e($d['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="address">UpaZilla
                                                Group</label>
                                            <select class="custom-select form-control required" id="upazila"
                                                    name="upazila">
                                                <option value="">Select UpaZilla</option>
                                                <option value="1">Placeholder</option>
                                                <?php $__currentLoopData = $upazila; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="option" value="<?php echo e($u['id']); ?>"><?php echo e($u['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span style="color: red;">*</span><label for="address">Police Station
                                                Group</label>
                                            <select class="custom-select form-control required" id="ps"
                                                    name="ps">
                                                <option value="">Select Police Station</option>
                                                <option value="1">Placeholder</option>
                                                <?php $__currentLoopData = $ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option id="option" value="<?php echo e($p['id']); ?>"><?php echo e($p['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <h3 class="box-title">Pop Profile select</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="center">
                                    <div class="form-group">
                                        <label>Mikrotik</label>
                                        <select class="form-control custom-select" id="sel_mkt" name="mikrotik">
                                            <option value="none">--Select a Mikrotik--</option>
                                            <?php $__currentLoopData = $mkt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($m['id']); ?>"><?php echo e($m['identity']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="profiles_table"
                                                   class="table full-color-table full-dark-table hover-table">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="js-switch" name="select-all"
                                                                   id="selectAll"
                                                                   data-color="#26c6da"/>
                                                            <label class="form-check-label">Select All</label>
                                                        </div>
                                                    </th>
                                                    <th>Price</th>
                                                    <th>Synonym</th>
                                                    <th>Cost Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody id="tablebody">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-info float-right" id="submit"
                                               />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#selectAll').click(function(e){
                console.log('heree')
                var table= $(e.target).closest('table');
                $('td input:checkbox',table).prop('checked',this.checked);
            });

           $("#sel_mkt").change(function () {
                const mkt = $(this).val();
                if (mkt === 'none') {
                    $("#tablebody").empty();
                }
                else{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                    });
                    $.ajax({
                        url: '/getprofile',
                        type: 'post',
                        data: {id: mkt},
                        dataType: 'json',
                        success: function (prof) {
                            $("#tablebody").empty();
                            console.log(prof)
                            var len = prof.length;
                            for (var i = 0; i < len; i++) {
                                var name = prof[i]['name'];
                                var id = prof[i]['id'];
                                var syn = prof[i]['synonym'] ?? '';
                                var price = prof[i]['price'];
                                var row = `
                            <tr class="mb-12">
                            <td class="mb-3">
                            <div class="form-check">
                            <input type="checkbox" name="ids[`+id+`]" class="js-switch" id="chkboxes" value="`+id+`" data-color="#26c6da"/>
                            <label class="form-check-label mr-2">` + name + `</label>
                            </div>
                            </td>
                            <td class="mb-3">` + price + `</td>
                            <td class="hidden" hidden><input type="text"  name="price" id="cost" value="` + price + `" hidden> </td>
                            <td class="mb-3">` + syn + `</td>
                            <td class="mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="ti-money"></i>
                                        </span>
                                    </div><input type="text" class="form-control" name="cost[`+id+`]" id="cost" placeholder="cost" aria-label="cost"
                                        aria-describedby="basic-addon2">
                                </div>
                            </td>
                            </tr>`
                                $("#tablebody").append(row);
                            }
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IU KHAN\Documents\smartisp\resources\views/pop/create.blade.php ENDPATH**/ ?>