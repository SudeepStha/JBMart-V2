<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JBMart</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
    type="text/css" />

  <!-- Select 2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    .ck-editor__editable_inline {
      min-height: 400px;
    }
  </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
         --}}
        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li> --}}

        {{-- 
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
         --}}
      </ul>
    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">JB Mart</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset(Auth::user()->logo ??'/dist/img/AdminLTELogo.png') }}" class="mt-1 rounded-circle"
              alt="User Image" style="height: 30px; width:30px; object-fit:cover;">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">

              <a href="/home" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-danger">New</span>
                </p>
              </a>
            </li>
            @can('view store')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Store
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @can('create store-type')
                <li class="nav-item">
                  <a href="/stores" class="nav-link">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>Create Store Type</p>
                  </a>
                </li>
                @endcan

                <li class="nav-item">
                  <a href="/profiles" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Store Profile</p>
                  </a>
                </li>

              </ul>
            </li>
            @endcan

            @can('view product')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-hamburger"></i>
                <p>
                  Product
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/unit/create" class="nav-link">
                    <i class="fab fa-unity nav-icon"></i>
                    <p>Create Unit</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/category" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Category</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/product" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Product</p>
                  </a>
                </li>

              </ul>
            </li>
            @endcan

            @role('Admin')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>
                  CMS
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/about" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About Us</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/termsofuser" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Terms of User</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/privacy_policy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Privacy and Policy</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/shipping_policy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Shipping Policy</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/return_policy" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Return of User</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/faq" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQ</p>
                  </a>
                </li>

              </ul>
            </li>
            @endrole

            @role('Super Admin')
            <li class="nav-header">ROLES AND PERMISSION</li>
            <li class="nav-item">
              <a href="/permission/create" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>Add Permission</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/role/create" class="nav-link">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>Add Role</p>
              </a>
            </li>

            @endrole

            @can('view user')
              <li class="nav-item">
                <a href="/accounts" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Accounts</p>
                </a>
              </li>
            @endcan

            @role('Admin')
            <li class="nav-item">
              <a href="/delivery" class="nav-link">
                <i class="nav-icon far fa-address-card"></i>
                <p>Delivery Accounts</p>
              </a>
            </li>
            @endrole

            @role('Admin')
            <li class="nav-header">Ad PROMOTION</li>
            <li class="nav-item">
              <a href="/banner" class="nav-link">
                <i class="fas fa-images nav-icon"></i>
                <p>Banner Slide</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/ad" class="nav-link">
                <i class="nav-icon fab fa-adversal"></i>
                <p>Ad Promotion</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/featured_store" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>Featured Store</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/featured_product" class="nav-link">
                <i class="nav-icon fas fa-hamburger"></i>
                <p>Featured Product</p>
              </a>
            </li>
            @endrole

            @can('view purchase order')
            <li class="nav-header">ORDER</li>
            <li class="nav-item">
              <a href="/purchase" class="nav-link">
                <i class="fas fa-file-invoice nav-icon"></i>
                <p>Purchase Order</p>
              </a>
            </li>
            @endcan
            <li class="nav-item">
              <a href="/order" class="nav-link">
                <i class="fas fa-cart-plus nav-icon"></i>
                <p>New Order</p>
              </a>
            </li>
           

            @role('Admin')
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Report
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Todays Sale</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sales Report Summary</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cash Flow</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Payslip Report</p>
                  </a>
                </li>

              
              </ul>
            </li>
            <li class="nav-header">Sales Lists</li>
              <li class="nav-item">
                  <a href="/sales" class="nav-link">
                    <i class="fas fa-file-invoice nav-icon"></i>
                    <p>Sales</p>
                  </a>
              </li>
            @endrole

            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">@yield('title')</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-{{now()->year}} <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> X X X
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="/dist/js/pages/dashboard3.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

  {{-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script> --}}
  <script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>

  {{-- // CK Editor --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
    $('.select2').select2({
      theme: "classic"
    });
});
  </script>
</body>

</html>