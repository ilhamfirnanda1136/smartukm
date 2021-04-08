<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('')}}/assets/css/shared/style.css">
    <!-- endinject -->
     <link rel="stylesheet" href="{{asset('')}}/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('')}}/assets/css/demo_1/style.css">
    <link rel="stylesheet" href="{{asset('css')}}/preloader.css">
    <link rel="stylesheet" href="{{asset('css')}}/responsive.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
    @yield('header')
    <style>
        .navbar.default-layout .navbar-brand-wrapper,.sidebar,.btn-primary {
            background: rgb(250,175,15) !important;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:{{asset('')}}/partials/_navbar.html -->
        @include('layouts.include.headerMember')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:{{asset('')}}/partials/_settings-panel.html -->
          
            <!-- partial -->
            @include('layouts.include.sidebarMember')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper"> @yield('content')</div>
                <!-- content-wrapper ends -->
                <!-- partial:{{asset('')}}/partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021 <a
                                href="https://asppi.or.id/" target="_blank">UMKM</a>. All rights
                            reserved.</span>
                    
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <div class="div-loading">
        <div id="loader" style="display: none;"></div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
     <!-- Plugin js for this page -->
    <script src="{{asset('')}}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{asset('')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{asset('')}}/assets/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js"></script>
    <!-- inject:js -->
    <script src="{{asset('')}}/assets/js/shared/off-canvas.js"></script>
    <script src="{{asset('')}}/assets/js/shared/hoverable-collapse.js"></script>
    <script src="{{asset('')}}/assets/js/shared/misc.js"></script>
    <script src="{{asset('')}}/assets/js/shared/settings.js"></script>
    <script src="{{asset('')}}/assets/js/shared/todolist.js"></script>
    <script src="{{asset('')}}/assets/vendors/sweetalert/sweetalert.min.js"></script>
    <script src="{{asset('js/input.js')}}"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script> 
        const process_env_url = "{{url('')}}";
        @if(Session::has('sukses'))
       swal({
              title: "Pesan!",
              text: "{{Session::get('sukses')}}",
              icon: "success",
          });
      @endif
    </script>
    @yield('footer')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>