<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
    <title>SmartISP</title>
    <link href="{{asset('assets/node_modules/wizard/steps.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('assets/dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/switchery/dist/switchery.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/node_modules/jsgrid/jsgrid.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/node_modules/jsgrid/jsgrid-theme.min.css')}}">

    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/jqueryui/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @toastr_css
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
                <a class="navbar-brand" href="{{url('/')}}">
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
    @auth
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div><img src="{{asset('assets/images/users/2.jpg')}}" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                               data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="{{url('/logout')}}" class="dropdown-item"><i class="fas fa-power-off"></i>Logout</a>
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
                                    @if(session('active'))
                                        {{session('active')->identity}}
                                    @else
                                        Select Active Mikrotik
                                    @endif
                                </span></a>
                            <div class="dropdown-menu animated flipInY targetdiv" id="mktdropdown">
                                @for($i=0; $i<sizeof(session('mkt'));$i++)
                                    <a href="#" id="target{{$i}}" data-custom-value="{{session('mkt')[$i]->id}}"
                                       class="dropdown-item">{{session('mkt')[$i]->identity}}</a>
                                @endfor
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
                                <li><a href="{{url('/user')}}">Users</a></li>
                                <li><a href="{{url('/roles')}}">Roles</a></li>
                                <li><a href="{{url('/permission')}}">Permissions</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-money"></i><span
                                    class="hide-menu">Billing</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/billing')}}">View Billings</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-ticket-alt"></i><span class="hide-menu">CRM</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/ticket')}}">Ticket List</a></li>
                                <li><a href="{{url('/ticket-category')}}">Type List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-ticket-alt"></i><span class="hide-menu">HRM</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('employee.index')}}">Manage Employees</a></li>
                                <li><a href="{{route('salary.index')}}">Manage Salaries</a></li>
                                <li><a href="{{route('leave.index')}}">Manage Leave</a></li>
                                <li><a href="{{route('position.index')}}">Manage Positions</a></li>
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
                                    <li><a href="{{url('/pop')}}">Add POP</a></li>
                                    <li><a href="{{url('/pop/create')}}">POP List</a></li>
                                    <a href="#">Assign Manager</a>
                                    <li><a href="#">Assign Mikrotik</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   aria-expanded="false">Franchise</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/franchise/create')}}">Add Franchise</a></li>
                                    <li><a href="{{url('/franchise')}}">Franchise List</a></li>
                                    <li><a href="#">Apply Credit</a></li>
                                    <li><a href="#">Credit Ledger</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   aria-expanded="false">Zone</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/zone')}}">View All</a></li>
                                    <li><a href="{{url('/zone/create')}}">Add Zone</a></li>
                                    <li><a href="{{url('/zone/create')}}">Zone Transfer</a></li>
                                    <li><a href="{{url('/zone/create')}}">Zone Transfer History</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Network Diagram</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/server')}}">Monitor Network</a></li>
                                    <li><a href="{{url('/optical')}}">Optical Network</a></li>
                                    <li><a href="{{url('/box')}}">Add New Box</a></li>
                                    <li><a href="{{url('/tjbox')}}">Add New TJ Box</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">FFTX</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/zone')}}">Add New OLT</a></li>
                                    <li><a href="{{url('/zone/create')}}">OLT List</a></li>
                                    <li><a href="{{url('/zone/create')}}">Add Brand</a></li>
                                    <li><a href="{{url('/zone/create')}}">Add Brand= List</a></li>
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
                                    <li><a href="{{url('/chartofaccounts/create')}}">Add</a></li>
                                    <li><a href="{{url('/chartofaccounts')}}">View All</a></li>
                                    <li><a href="{{url('/chartofaccounts/list')}}">List All</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Accounts</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href=/accounts/create>Add</a></li>
                                    <li><a href="{{url('/accounts')}}">View All</a></li>
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
                                    <li><a href='{{url('/journals/create')}}'>Add</a></li>
                                    <li><a href="{{url('/journals')}}">View All</a></li>
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
                                    <li><a href="{{url('/product')}}">Product</a></li>
                                    <li><a href="{{url('/productcategory')}}">Category</a></li>
                                    <li><a href="{{url('/productvendor')}}">Vendor</a></li>
                                    '}}
                                    <li><a href="{{url('/productbrand')}}">Brands</a></li>
                                    <li><a href="{{url('/productunit')}}">Units</a></li>
                                    <li><a href="{{url('/purchase')}}">Purchase Product</a></li>
                                </ul>
                                {{--                                <a href="javascript:void(0)"--}}
                                {{--                                   class="hide-menu" aria-expanded="false">Requisition</a>--}}
                                {{--                                <ul aria-expanded="false" class="collapse">--}}
                                {{--                                    <li><a href=#>Add</a></li>--}}
                                {{--                                    <li><a href="#">Approve</a></li>--}}
                                {{--                                </ul>--}}
                                {{--                                <a href="javascript:void(0)"--}}
                                {{--                                   class="hide-menu" aria-expanded="false">Purchase</a>--}}
                                {{--                                <ul aria-expanded="false" class="collapse">--}}
                                {{--                                    <li><a href="{{url'/purchase">Purchase Product</a></li>--}}
                                {{--                                </ul>--}}
                                {{--                                <a href="javascript:void(0)"--}}
                                {{--                                   class="hide-menu" aria-expanded="false">Sales</a>--}}
                                {{--                                <ul aria-expanded="false" class="collapse">--}}
                                {{--                                    <li><a href=#>Add Customer Data</a></li>--}}
                                {{--                                    <li><a href="#">Sales Invoice</a></li>--}}
                                {{--                                    <li><a href="#">Approve Invoice</a></li>--}}
                                {{--                                    <li><a href="#">Return Product</a></li>--}}
                                {{--                                </ul>--}}
                                {{--                                <a href="javascript:void(0)"--}}
                                {{--                                   class="hide-menu" aria-expanded="false">Reports</a>--}}
                                {{--                                <ul aria-expanded="false" class="collapse">--}}
                                {{--                                    <li><a href=#>Product List</a></li>--}}
                                {{--                                    <li><a href="#">Product Ledger</a></li>--}}
                                {{--                                </ul>--}}
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-user"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/customer')}}">View All</a></li>
                                <li><a href="{{url('/customer/create')}}">Add User</a></li>
                                <li><a href="{{url('/customertype')}}">View Customer Types</a></li>
                                <li><a href="{{url('/customertype/create')}}">Add Customer Type</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-pin"></i><span class="hide-menu">Police Station</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/policestation')}}">View All</a></li>
                                <li><a href="{{url('/policestation/create')}}">Add Police Station</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-location-arrow"></i><span class="hide-menu">District</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/district')}}">View All</a></li>
                                <li><a href="{{url('/district/create')}}">Add District</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fas fa-map-signs"></i><span
                                    class="hide-menu">UpaZilla</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/upazila')}}">View All</a></li>
                                <li><a href="{{url('/upazila/create')}}">Add UpaZila</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-link"></i><span
                                    class="hide-menu">Synchronize</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/sync')}}">Synchronize all</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">--- Mikrotik</li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-tablet"></i><span class="hide-menu">Mikrotik</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/mikrotik')}}">View All</a></li>
                                <li><a href="{{url('/mikrotik/create')}}">Add Mikrotik</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-rss-alt"></i><span class="hide-menu">Hotspot</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Server</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/hotspot')}}">Server List</a></li>
                                    <li><a href="{{url('/hotspot/create')}}">Add Server</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Users</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/hotspotuser/create')}}">Add User</a></li>
                                    <li><a href="{{url('/hotspotuser')}}">Users List</a></li>
                                    <li><a href="{{url('/hotspotuser/batch')}}">Generate</a></li>
                                    <li><a href="{{url('/hotspotuser/hosts')}}">Hosts</a></li>
                                </ul>
                                <a href="javascript:void(0)"
                                   class="hide-menu" aria-expanded="false">Profile</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{url('/hotspotprofile')}}">Profile List</a></li>
                                    <li><a href="{{url('/hotspotprofile/create')}}">Add Profile</a></li>
                                </ul>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="fab fa-connectdevelop"></i><span class="hide-menu">DHCP Leases</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/dhcp')}}">View All</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti ti-briefcase"></i><span
                                    class="hide-menu">Packages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/package')}}">View All</a></li>
                                <li><a href="{{url('/package/create')}}">Add Package</a></li>
                                <li><a href="{{url('/package/sync')}}">Sync Package</a></li>
                                <li><a href="{{url('/package/sync')}}">Package Pricing</a></li>
                                <li><a href="{{url('/package/sync')}}">Add Reseller Packages</a></li>
                                <li><a href="{{url('/package/sync')}}">View Reseller Packages</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-panel"></i><span
                                    class="hide-menu">IP Address</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/ipaddress')}}">View All</a></li>
                                <li><a href="{{url('/ipaddress/create')}}">Add IP Address</a></li>
                                <li><a href="{{url('/ippool')}}">View IP POOLS</a></li>
                                <li><a href="{{url('/ippool/create')}}">Add IP POOL</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                               aria-expanded="false"><i class="ti-link"></i><span class="hide-menu">Queue</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('/queue')}}">View All Queue Simple</a></li>
                                <li><a href="{{url('/queue/create')}}">Add Queue Simple</a></li>
                                <li><a href="{{url('/queuetype')}}">View All Queue Type</a></li>
                                <li><a href="{{route('queuetype.create')}}">Add Queue type</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
    @endauth
    <div class="page-wrapper">
        @yield('breadcumb')

        <div id="app">
            @yield('content')
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

<script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/dist/js/multiselect.min.js')}}"></script>
<script src="{{asset('assets/dist/js/waves.js')}}"></script>
<script src="{{asset('assets/dist/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/dist/js/custom.min.js')}}"></script>
<script src="{{asset('assets/node_modules/raphael/raphael-min.js')}}"></script>
<script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}}"></script>
<script src="{{asset('assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{asset('assets/dist/js/dashboard1.js')}}"></script>
<script src="{{asset('assets/node_modules/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/node_modules/jsgrid/db.js')}}"></script>
<script src="{{asset('assets/node_modules/wizard/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/node_modules/wizard/jquery.validate.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{asset('assets/node_modules/jsgrid/jsgrid.min.js')}}"></script>
<script src="{{asset('assets/dist/js/pages/jsgrid-init.js')}}"></script>
<script src="{{asset('assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>

@toastr_js
@toastr_render
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<script src="{{asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });


        $('#my_table').DataTable();
        var noofanchors = document.getElementById("mktdropdown").getElementsByTagName("a");
        for (var i = 0; i < noofanchors.length; i++) {
            $("#target" + i).click(function () {
                var value = $(this).data("custom-value");
                $.ajax({
                    method: 'POST',
                    url: '{{url("/setsession/setActive")}}',
                    data: {
                        id: value,
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function () {
                        Swal.fire('Arghhhhh!',
                            response,
                            'An Error Occurred')
                    }

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
@stack('scripts')
</body>
</html>
