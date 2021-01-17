<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('images/favicon.png')); ?>">
    <title>SmartISP</title>

    
    
    

    <link href="<?php echo e(asset('assets/node_modules/wizard/steps.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/morrisjs/morris.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/dist/css/style.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/dist/css/pages/dashboard1.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.css')); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/node_modules/dropify/dist/css/dropify.min.css')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/node_modules/jsgrid/jsgrid.min.css')); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/node_modules/jsgrid/jsgrid-theme.min.css')); ?>">

    <script src="<?php echo e(asset('assets/node_modules/jquery/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/jqueryui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.js')); ?>"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo toastr_css(); ?>
</head>
<body class="skin-default-dark fixed-layout" id="app">
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">SmartISP</p>
    </div>
</div>
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <h4 class="dark-logo" style="color:#0A0A0A">SmartISP</h4>
                    <h4 class="light-logo">SmartISP</h4>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="ti ti-menu"></i></a></li>
                    <li class="nav-item"><a
                            class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti ti-menu"></i></a></li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item right-side-toggle"><a class="nav-link  waves-effect waves-light"
                                                              href="javascript:void(0)"><i
                                class="ti ti-settings"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <?php if(auth()->guard()->check()): ?>
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="<?php echo e(asset('assets/images/users/2.jpg')); ?>" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                               data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"><?php echo e(Auth::user()->name); ?><span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="/logout" class="dropdown-item"><i class="fas fa-power-off"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-profile">
                    <div class="user-pro-body">
                        <h5 class="text-center" style="color: #0b97c4">Active Mikrotik</h5>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                               data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false" id="referesh"><span class="caret">
                                    <?php if(session('active')): ?>
                                        <?php echo e(session('active')->identity); ?>

                                    <?php else: ?>
                                        Select Active Mikrotik
                                    <?php endif; ?>
                                </span></a>
                            <div class="dropdown-menu animated flipInY targetdiv" id="mktdropdown">
                                <?php for($i=0; $i<sizeof(session('mkt'));$i++): ?>
                                    <a href="#" id="target<?php echo e($i); ?>" data-custom-value="<?php echo e(session('mkt')[$i]->id); ?>"
                                       class="dropdown-item"><?php echo e(session('mkt')[$i]->identity); ?></a>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- MAIN MENU</li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-user"></i><span class="hide-menu">APP Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/user">Users</a></li>
                                <li><a href="/roles">Roles</a></li>
                                <li><a href="/permission">Permissions</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-sitemap"></i><span
                                    class="hide-menu">Network</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <a href="javascript:void(0)"
                                   aria-expanded="false">POP</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/pop">Add POP</a></li>
                                    <li><a href="/pop/create">POP List</a></li>
                                    <a href="#">Assign Manager</a>
                                    <li><a href="#">Assign Mikrotik</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   aria-expanded="false">Franchise</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/franchise/create">Add Franchise</a></li>
                                    <li><a href="/franchise">Franchise List</a></li>
                                    <li><a href="#">Apply Credit</a></li>
                                    <li><a href="#">Credit Ledger</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   aria-expanded="false">Zone</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/zone">View All</a></li>
                                    <li><a href="/zone/create">Add Zone</a></li>
                                    <li><a href="/zone/create">Zone Transfer</a></li>
                                    <li><a href="/zone/create">Zone Transfer History</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Network Diagram</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/server">Monitor Network</a></li>
                                    <li><a href="/optical">Optical Network</a></li>
                                    <li><a href="/box">Add New Box</a></li>
                                    <li><a href="/tjbox">Add New TJ Box</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">FFTX</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/zone">Add New OLT</a></li>
                                    <li><a href="/zone/create">OLT List</a></li>
                                    <li><a href="/zone/create">Add Brand</a></li>
                                    <li><a href="/zone/create">Add Brand= List</a></li>
                                </ul>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-dollar-sign"></i><span
                                    class="hide-menu">Accounts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Chart Of Accounts</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/chartofaccounts/create">Add</a></li>
                                    <li><a href="/chartofaccounts">View All</a></li>
                                    <li><a href="/chartofaccounts/list">List All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Accounts</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=/accounts/create>Add</a></li>
                                    <li><a href="/accounts">View All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Ledger Accounts</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=#>Add</a></li>
                                    <li><a href="#">View All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Journal Entry</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href='/journals/create'>Add</a></li>
                                    <li><a href="/journals">View All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Reciept And Payment</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=#>Add</a></li>
                                    <li><a href="#">View All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Income Statement</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=#>Add</a></li>
                                    <li><a href="#">View All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Balance Sheet</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=#>Add</a></li>
                                    <li><a href="#">View All</a></li>
                                </ul>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-dollar-sign"></i><span
                                    class="hide-menu">Inventory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Products</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=/product>Product</a></li>
                                    <li><a href=/productcategory>Category</a></li>
                                    <li><a href=/productvendor>Vendor</a></li>
                                    <li><a href=/productbrand>Brands</a></li>
                                    <li><a href=/productunit>Units</a></li>
                                    <li><a href="/purchase">Purchase Product</a></li>
                                </ul>

























                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-user"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/customer">View All</a></li>
                                <li><a href="/customer/create">Add User</a></li>
                                <li><a href="/customertype">View Customer Types</a></li>
                                <li><a href="/customertype/create">Add Customer Type</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-pin"></i><span class="hide-menu">Police Station</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/policestation">View All</a></li>
                                <li><a href="/policestation/create">Add Police Station</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-location-arrow"></i><span class="hide-menu">District</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/district">View All</a></li>
                                <li><a href="/district/create">Add District</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-map-signs"></i><span
                                    class="hide-menu">UpaZilla</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/upazila">View All</a></li>
                                <li><a href="/upazila/create">Add UpaZila</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-link"></i><span
                                    class="hide-menu">Synchronize</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/sync ">Synchronize all</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">--- Mikrotik</li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-tablet"></i><span class="hide-menu">Mikrotik</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/mikrotik">View All</a></li>
                                <li><a href="/mikrotik/create">Add Mikrotik</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-rss-alt"></i><span class="hide-menu">Hotspot</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Server</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/hotspot">Server List</a></li>
                                    <li><a href="/hotspot/create">Add Server</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Users</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/hotspotuser/create">Add User</a></li>
                                    <li><a href="/hotspotuser">Users List</a></li>
                                    <li><a href="/hotspotuser/batch">Generate</a></li>
                                    <li><a href="/hotspotuser/hosts">Hosts</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Profile</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="/hotspotprofile">Profile List</a></li>
                                    <li><a href="/hotspotprofile/create">Add Profile</a></li>
                                </ul>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fab fa-connectdevelop"></i><span class="hide-menu">DHCP Leases</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/dhcp">View All</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-briefcase"></i><span
                                    class="hide-menu">Packages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/package">View All</a></li>
                                <li><a href="/package/create">Add Package</a></li>
                                <li><a href="/package/sync">Sync Package</a></li>
                                <li><a href="/package/sync">Package Pricing</a></li>
                                <li><a href="/package/sync">Add Reseller Packages</a></li>
                                <li><a href="/package/sync">View Reseller Packages</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-panel"></i><span
                                    class="hide-menu">IP Address</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/ipaddress">View All</a></li>
                                <li><a href="/ipaddress/create">Add IP Address</a></li>
                                <li><a href="/ippool">View IP POOLS</a></li>
                                <li><a href="/ippool/create">Add IP POOL</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-link"></i><span class="hide-menu">Queue</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/queue ">View All Queue Simple</a></li>
                                <li><a href="/queue/create">Add Queue Simple</a></li>
                                <li><a href="/queuetype ">View All Queue Type</a></li>
                                <li><a href="<?php echo e(route('queuetype.create')); ?>">Add Queue type</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    <?php endif; ?>
    <div class="page-wrapper">
        <?php echo $__env->yieldContent('breadcumb'); ?>

        <div id="app">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti ti-close right-side-toggle"></i></span></div>
        <div class="r-panel-body">
            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default-dark"
                       class="default-dark-theme working">7</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
            </ul>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('assets/node_modules/popper/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/perfect-scrollbar.jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/multiselect.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/waves.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/sidebarmenu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/custom.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/raphael/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/morrisjs/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/toast-master/js/jquery.toast.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/dashboard1.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/peity/jquery.peity.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/jsgrid/db.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/wizard/jquery.steps.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/wizard/jquery.validate.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="<?php echo e(asset('assets/node_modules/jsgrid/jsgrid.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/pages/jsgrid-init.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/switchery/dist/switchery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')); ?>"></script>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<script src="<?php echo e(asset('assets/node_modules/dropify/dist/js/dropify.min.js')); ?>"></script>
<script>

    $(document).ready(function () {
        var noofanchors = document.getElementById("mktdropdown").getElementsByTagName("a");
        for (var i = 0; i < noofanchors.length; i++) {
            $("#target" + i).click(function () {
                var value = $(this).data("custom-value");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: '/setsession/setActive',
                    data: {
                        id: value,
                    },
                    success: function (response) {
                        window.location = '/'
                        Swal.fire('Good job!',
                            response,
                            'success')
                    },

                });
            });
        }


        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    })
    ;
</script>
<script>

    //Custom design form example
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
    }), $(".validation-wizard").validate({
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
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\iukha\PhpstormProjects\smartisp\resources\views/layouts/template.blade.php ENDPATH**/ ?>