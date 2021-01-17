<?php $__env->startSection('content'); ?>
    <?php if($message = session()->get('success')): ?>
        <div class="alert alert-success">
            <script>
                Swal.fire('Good job!',
                    'Success',
                    '<?php echo e($message); ?>')
            </script>
        </div>
    <?php endif; ?>
    <div class="row" id="validation">
        <div class="col-12 ">
            <div class="card m-3 wizard-content">
                <div class="card-body">
                    <h4 class="card-title">User Information</h4>
                    <h6 class="card-subtitle">Fill the step wise form to register user</h6>
                    <form method="post" action="<?php echo e(route('customer.store')); ?>" id="user_form"
                          class="validation-wizard wizard-circle">
                    <?php echo csrf_field(); ?>
                    <!-- Step 1 -->
                        <h6>User Personal Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name :</label>
                                        <input type="text" class="form-control required" name="full_name"
                                               id="full_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="father_name">Father's Name : </label>
                                        <input type="text" class="form-control required" name="father_name"
                                               id="father_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="connection_type"> Select Gender : <span class="danger">*</span>
                                        </label>
                                        <select class="custom-select form-control required" id="gender"
                                                name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="n/a">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="proof_of_id">Proof Of Identity : </label>
                                        <input type="text" class="form-control required" name="proof_of_id"
                                               id="proof_of_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_num">ID number : </label>
                                        <input type="text" class="form-control required" name="id_num"
                                               id="id_num">
                                    </div>
                                    <div class="form-group">
                                        <label for="occupation">Occupation : </label>
                                        <input type="text" class="form-control required" name="occupation"
                                               id="occupation">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address :</label>
                                        <input type="text" class="form-control required" name="email"
                                               id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_no">Mobile No : </label>
                                        <input type="text" class="form-control required" name="mobile_no"
                                               id="mobile_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth : </label>
                                        <input type="date" class="form-control" name="dob" id="dob">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Upload Image</h4>
                                            <label for="input-file-now-custom-1">Default image is added if none
                                                selected</label>
                                            <input type="file" id="input-file-now-custom-1" name="photo"
                                                   class="dropify"
                                                   data-default-file="<?php echo e(asset('assets/node_modules/dropify/src/images/test-image-1.jpg')); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 2 -->
                        <h6>Address</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <h5>Present Address</h5>
                                            <hr>
                                            <div class="form-group">
                                                <label for="house_no">House No :</label>
                                                <input type="text" class="form-control required" name="pr_house_no"
                                                       id="house_no">
                                            </div>
                                            <div class="form-group">
                                                <label for="road">Road No :</label>
                                                <input type="text" class="form-control" name="pr_road" id="road">
                                            </div>
                                            <div class="form-group">
                                                <label for="flat">Flat No :</label>
                                                <input type="text" class="form-control" name="pr_flat" id="flat">
                                            </div>
                                            <div class="form-group">
                                                <label for="area">Area :</label>
                                                <input type="text" class="form-control" name="pr_area" id="area">
                                            </div>
                                            <div class="form-group">
                                                <label for="post_code">Post Code :</label>
                                                <input type="text" class="form-control required" name="pr_post_code"
                                                       id="post_code">
                                            </div>
                                            <div class="form-group">
                                                <label for="upazilla">Upazilla :</label>
                                                <select class="custom-select form-control required" id="upazilla"
                                                        name="pr_upazilla">
                                                    <option value="">Select Upazilla</option>
                                                    <?php $__currentLoopData = $upazila; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $up): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($up['id']); ?>"><?php echo e($up['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="police_station">Police Station :</label>
                                                <select class="custom-select form-control required"
                                                        id="police_station"
                                                        name="pr_police_station">
                                                    <option value="">Select Police Station</option>
                                                    <?php $__currentLoopData = $police_station; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ps['id']); ?>"><?php echo e($ps['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="district">District :</label>
                                                <select class="custom-select form-control required" id="district"
                                                        name="pr_district">
                                                    <option value="">Select District</option>
                                                    <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($dis['id']); ?>"><?php echo e($dis['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <h5>Permanent Address</h5>
                                            <hr>
                                            <div class="form-group">
                                                <label>Same as Present address: </label>
                                                <input type="checkbox" name="sameAsPresent" class="js-switch"
                                                       data-color="#009efb"
                                                       id="checkSameAddress">
                                            </div>
                                            <div id="permanent_div">
                                                <div class="form-group">
                                                    <label for="house_no">House No :</label>
                                                    <input type="text" class="form-control required"
                                                           name="perm_house_no"
                                                           id="house_no">
                                                </div>
                                                <div class="form-group">
                                                    <label for="road">Road No :</label>
                                                    <input type="text" class="form-control" name="perm_road" id="road">
                                                </div>
                                                <div class="form-group">
                                                    <label for="flat">Flat No :</label>
                                                    <input type="text" class="form-control" name="perm_flat" id="flat">
                                                </div>
                                                <div class="form-group">
                                                    <label for="area">Area :</label>
                                                    <input type="text" class="form-control" name="perm_area" id="area">
                                                </div>
                                                <div class="form-group">
                                                    <label for="post_code">Post Code :</label>
                                                    <input type="text" class="form-control required" name="perm_post_code"
                                                           id="post_code">
                                                </div>
                                                <div class="form-group">
                                                    <label for="upazilla">Upazilla :</label>
                                                    <select class="custom-select form-control required" id="upazilla"
                                                            name="perm_upazilla">
                                                        <option value="">Select Upazilla</option>
                                                        <?php $__currentLoopData = $upazila; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $up): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($up['id']); ?>"><?php echo e($up['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="police_station">Police Station :</label>
                                                    <select class="custom-select form-control required"
                                                            id="police_station"
                                                            name="perm_police_station">
                                                        <option value="">Select Police Station</option>
                                                        <?php $__currentLoopData = $police_station; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($ps['id']); ?>"><?php echo e($ps['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="district">District :</label>
                                                    <select class="custom-select form-control required" id="district"
                                                            name="perm_district">
                                                        <option value="">Select District</option>
                                                        <?php $__currentLoopData = $district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($dis['id']); ?>"><?php echo e($dis['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 3 -->
                        <h6>User Account Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zone"> Zone : <span class="danger">*</span> </label>
                                        <select class="custom-select form-control required" id="zone" name="zone">
                                            <option value="">Select Zone</option>
                                            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($zone['id']); ?>"><?php echo e($zone['name']); ?>

                                                    <small>(<?php echo e($zone['abbr']); ?>)</small></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ref_no">Ref No :</label>
                                        <input type="text" class="form-control required" name="ref_no" id="ref_no">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="registration_date"> Registration Date : <span
                                                class="danger">*</span> </label>
                                        <input type="date" class="form-control required" id="registration_date"
                                               name="registration_date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_type"> Customer Type : <span class="danger">*</span>
                                        </label>
                                        <select class="custom-select form-control required" id="customer_type"
                                                name="customer_type">
                                            <option value="">Select Customer Type</option>
                                            <?php $__currentLoopData = $customer_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type['id']); ?>"><?php echo e($type['type']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="connection_type"> Connection Type : <span
                                                class="danger">*</span>
                                        </label>
                                        <select class="custom-select form-control required" id="connection_type"
                                                name="connection_type">
                                            <option value="">Select Connection Type</option>
                                            <option value="di_private">Dynamic IP Private (PPPOE NAT)</option>
                                            <option value="di_public">Dynamic IP Public(PPPOE)</option>
                                            <option value="si_private">Static IP Private (PPPOE)</option>
                                            <option value="si_public">Static IP Public (PPPOE)</option>
                                            <option value="si_private_queue">Static IP Private (Queue)</option>
                                            <option value="si_public_queue">Static IP Public (Queue)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="connection_date">Connection Date : <span class="danger">*</span>
                                        </label>
                                        <input type="date" class="form-control required" id="connection_date"
                                               name="connection_date">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h6>Connection</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="custom-select form-control required" id="mikrotik"
                                                name="mikrotik">
                                            <option value="">Select Mikrotik</option>
                                            <?php $__currentLoopData = $mikrotiks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mtk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($mtk['id']); ?>"><?php echo e($mtk['identity']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none" id="static_type">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control required" id="username"
                                                   placeholder="User Name"
                                                   name="username">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control required" id="password"
                                                   placeholder="Password"
                                                   name="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="Service" class="form-control required"
                                               id="service"
                                               name="service">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="remote_address" class="form-control"
                                               id="remote_address"
                                               placeholder="Remote Address"
                                               name="remote_address">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="row" id="type_sip_queue" style="display: none">
                                <hr>
                                <div class="col-md-12">
                                    <h4>Queue</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control required m-t-10" placeholder="Name :"
                                               name="queue_name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="target" name="queue_ip"
                                               placeholder="Target Address: XX:XX:XX:XX">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" data-toggle="modal"
                                                    data-target="#myModal">Available IP Addresses
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">IP address</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>IP Address</th>
                                                            <th>Network</th>
                                                            <th>Interface</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $ip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($addr['id']); ?></td>
                                                                <td><?php echo e($addr['address']); ?></td>
                                                                <td><?php echo e($addr['network']); ?></td>
                                                                <td><?php echo e($addr['interface']); ?></td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <select class="custom-select form-control required" id="queue_dst"
                                            name="queue_dst" placeholder="Destination">
                                        <option value="1">Select Destination</option>
                                        <?php $__currentLoopData = $int; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($i['name']); ?>"><?php echo e($i['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Priority</span>
                                        </div>
                                        <input type="text" name="d_priority" placeholder="Download"
                                               class="form-control">
                                        <input type="text" name="u_priority" placeholder="Upload"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <select class="custom-select" id="inputGroupSelect04" name="queue_type">
                                            <option selected>Select Queue</option>
                                            <option value="simple">Simple</option>
                                            <option value="pcq">pcq</option>

                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg"
                                                    type="button">Add Queue Type
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal"
                                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Add Queue Type</h4>
                                                    <div id="queueform">
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                   placeholder="Enter Name" id="name">
                                                        </div>

                                                        <div class="form-group">
                                                            <select class="custom-select form-control required"
                                                                    id="kind"
                                                                    name="kind">
                                                                <option value="default">Select Kind</option>
                                                                <option value="bfifo">bfifo</option>
                                                                <option value="mq fifo">mq fifo</option>
                                                                <option value="none">none</option>
                                                                <option value="pcq">pcq</option>
                                                                <option value="pfifo">pfifo</option>
                                                                <option value="red">red</option>
                                                                <option value="sfq">sfq</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" name="pcq-rate" class="form-control"
                                                                   placeholder="Enter pcq-rate" id="pcq-rate">
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" name="pcq-burst-rate"
                                                                   class="form-control"
                                                                   placeholder="Enter pcq-burst-rate"
                                                                   id="pcq-burst-rate">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control"
                                                                   name="pcq-burst-threshold"
                                                                   placeholder="Enter pcq-burst-threshold"
                                                                   id="pcq-burst-threshold">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" name="pcq-burst-time"
                                                                   placeholder="Enter pcq-burst-time"
                                                                   id="pcq-burst-time">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rocket_no">pcq-classifier : </label>
                                                            <div class="switchery-demo m-b-30 row">
                                                                <div class="col-md-3">
                                                                    <label for="rocket_no">dst-address: </label>
                                                                    <input type="checkbox" name="dst" id="dst" checked
                                                                           class="js-switch"
                                                                           data-color="#26c6da"/>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="rocket_no">src-address: </label>
                                                                    <input type="checkbox" name="src" id="src" checked
                                                                           class="js-switch"
                                                                           data-color="#26c6da"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success" id="queueform_submit">Add new
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="queue_none" style="display: none">
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Max-limit :</span>
                                            </div>
                                            <input type="text" name="d_max_limit" placeholder="Download"
                                                   class="form-control">
                                            <input type="text" name="u_max_limit" placeholder="Upload"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Burst-limit :</span>
                                            </div>
                                            <input type="text" name="d_burst_limit" placeholder="Download"
                                                   class="form-control">
                                            <input type="text" name="u_burst_limit" placeholder="Upload"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Burst-threshold :</span>
                                            </div>
                                            <input type="text" name="d_burst_threshhold" placeholder="Download"
                                                   class="form-control">
                                            <input type="text" name="u_burst_threshhold" placeholder="Upload"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="">Burst-time :</span>
                                            </div>
                                            <input type="text" name="d_burst_time" placeholder="Download"
                                                   class="form-control">
                                            <input type="text" name="u_burst_time" placeholder="Upload"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment"> Comment : <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control required m-t-10"
                                               id="comment"
                                               name="queue_comment">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="custom-select form-control required" id="profile"
                                                name="profile">
                                            <option value="1">Select Profile</option>
                                            <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option id="option" value="<?php echo e($pack['id']); ?>"><?php echo e($pack['name']); ?>

                                                    <small>(<?php echo e($pack['synonym']); ?>)</small></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control required" id="mac_address"
                                               placeholder="MAC Address"
                                               name="mac_address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="remote_ip"
                                               placeholder="Remote IP"
                                               name="remote_ip">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control required" id="router_comment"
                                               placeholder="Router Comments"
                                               name="router_comment">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="rocket_no">Status: </label>
                                        <input type="checkbox" name="status" checked class="js-switch"
                                               data-color="#26c6da"/>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 5 -->
                        <h6>Billing/Payment Info</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_bill">Monthly Bill :</label>
                                        <input type="text" class="form-control required" name="monthly_bill"
                                               id="monthly_bill">
                                    </div>
                                    <div class="form-group">
                                        <label for="perm_discount">Permanent Discount(input 0 if no discount): </label>
                                        <input type="number" class="form-control" name="perm_discount"
                                               id="perm_discount">
                                    </div>
                                    <div class="form-group">
                                        <label for="billing_cycle">Billing Cycle : </label>
                                        <select class="custom-select form-control required" id="billing_cycle"
                                                name="billing_cycle">
                                            <option value="">Select Any one</option>
                                            <option value="day-wise">Day Wise</option>
                                            <option value="fixed">Fixed Billing Date</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-none" id="billing_date">
                                        <label for="billing_date">Billing Start Date : </label>
                                        <input class="form-control required" type="date" name="billing_date"
                                               placeholder="Select Billing Start Date">
                                    </div>

                                    <div class="form-group">
                                        <label for="reg_fee">Registration Fee :</label>
                                        <select class="custom-select form-control required"
                                                name="reg_fee">
                                            <option value="">Select Any one</option>
                                            <option value="refundable">Refundable</option>
                                            <option value="non-refundable">Non-Refundable</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rocket_no">Send Billing Reminder : </label>
                                        <div class="switchery-demo m-b-30 row">
                                            <div class="col-md-3">
                                                <label for="rocket_no">Email: </label>
                                                <input type="checkbox" name="send_email" checked class="js-switch"
                                                       data-color="#26c6da"/>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="rocket_no">SMS: </label>
                                                <input type="checkbox" name="send_sms" checked class="js-switch"
                                                       data-color="#26c6da"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile_banking"> Mobile Banking : <span class="danger">*</span>
                                        </label>
                                        <select class="custom-select form-control required" id="mobile_banking"
                                                name="mobile_banking">
                                            <option value="">Select Any one</option>
                                            <option value="bkash">Bkash</option>
                                            <option value="rocket">Rocket</option>
                                            <option value="nogod">Nogod</option>
                                            <option value="other">others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank_payment"> Bank Payment : <span class="danger">*</span>
                                        </label>
                                        <select class="custom-select form-control required" id="bank_dropdown"
                                                name="bank_payment">
                                            <option value="">Select Any one</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div id="bank_options" class="d-none">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name : </label>
                                            <input type="text" class="form-control" name="bank_name" id="bank_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_account_name">Bank Account Name : </label>
                                            <input type="text" class="form-control" name="bank_account_name"
                                                   id="bank_account_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_acc_no">Bank Account No : </label>
                                            <input type="text" class="form-control" name="bank_acc_no"
                                                   id="bank_acc_no">
                                        </div>
                                        <div class="form-group">
                                            <label for="bank_acc_branch">Bank Account Branch : </label>
                                            <input type="text" class="form-control" name="bank_acc_branch"
                                                   id="bank_acc_branch">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            let billingDrp = $('#billing_cycle');
            let bankDrp = $('#bank_dropdown');
            billingDrp.change(function () {
                if (billingDrp.val() === 'day-wise')
                    $('#billing_date').removeClass('d-none');
                else
                    $('#billing_date').addClass('d-none');
            })
            bankDrp.change(function () {
                if (bankDrp.val() === "yes") {
                    $('#bank_options').removeClass('d-none');
                } else {
                    $('#bank_options').addClass('d-none');
                }
            });
            $('#mobile_banking').change(function () {

            });
            $('#checkSameAddress').change(function () {
                if ($('#checkSameAddress').is(':checked')) {
                    $('#permanent_div').addClass('d-none');
                } else
                    $('#permanent_div').removeClass('d-none');

            });

            let connDrp = $('#connection_type');
            connDrp.on('change', function (e) {
                let val = e.target.value;
                if (val === "si_private" || val === "si_public" || val === "si_private_queue" || val === "si_public_queue") {
                    $('#type_sip').show();
                } else {
                    $('#type_sip').hide();
                }
                if (val === "si_private_queue" || val === "si_public_queue") {
                    $('#type_sip_queue').show();
                    $('#static_type').hide();
                } else {
                    $('#static_type').show();
                    $('#type_sip_queue').hide();
                }
            });
            $('#queue_type').on('change', function (e) {
                let val = e.target.value;
                $('#queue_none').show();
                if (val === "") {
                    $('#queue_none').show();
                } else {
                    $('#queue_none').hide();
                }
            });


            $('#queueform_submit').click(function (event) {
                event.preventDefault()
                $('#queueform').html('Sending..');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: "<?php echo e(route('queuetype.store')); ?>",
                    data: {
                        name: $('#name').val(),
                        kind: $('#kind').val(),
                        pcq_rate: $('#pcq-rate').val(),
                        pcq_burst_rate: $('#pcq-burst-rate').val(),
                        pcq_burst_threshold: $('#pcq-burst-threshold').val(),
                        pcq_burst_time: $('#pcq-burst-time').val(),
                        dst: $('#dst').val(),
                        src: $('#src').val(),
                    },
                    success: function (response) {
                        $('#modal').modal('toggle');
                        Swal.fire('Good job!',
                            response,
                            'success')
                    },
                });
            });

        })


    </script>

    <script>
        $(".tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onFinished: function (event, currentIndex) {
                document.getElementById('user_form').submit();
            }
        });

        var form = $(".validation-wizard").show();

        $(".validation-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
            },
            onFinishing: function (event, currentIndex) {
                return form.valid()
            },
            onFinished: function (event, currentIndex) {
                document.getElementById('user_form').submit();
            }
        }),
            $(".validation-wizard").validate({
                ignore: "input[type=hidden]",
                errorClass: "text-danger",
                successClass: "text-success",
                highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element)
                },
                rules: {
                    email: {
                        email: !0
                    }
                }
            })

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\SmartISP\resources\views/customer/create.blade.php ENDPATH**/ ?>