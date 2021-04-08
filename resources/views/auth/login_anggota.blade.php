
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN ANGGOTA UMKM </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{asset('')}}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('')}}/assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
    <style>
      .auth.auth-bg-1 {
        background: url("{{asset('images/yellow-login.jpg')}}") !important;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
              <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                  <div class="auto-form-wrapper">
                @if(Session::has('successMSG'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil &nbsp</strong>{{session('successMSG')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error &nbsp</strong>{{session('error')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <img src="{{asset('')}}/images/logo2.png" alt="logo asppi" class="text-center center" width="50%" style="margin-left:110px;">
                {{-- <img src="{{asset('')}}/images/logologin.png" alt="logo siska" class="text-center center" width="50%"  style="margin-left:90px;"> --}}
                  <h4 class="text-center">SISTEM INFORMASI SMART UMKM <br> (Login Anggota)</h4>
                <form action="" method="post" class="user" >
                  @csrf
                  <div class="form-group">
                    <label class="label">Email</label>
                    <div class="input-group">
                      <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-warning text-white submit-btn btn-block">Login</button>
                  </div>
                  <small class="text-center" style="margin-left: 116px;">UMKM</small>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{asset('')}}/assets/js/shared/off-canvas.js"></script>
    <script src="{{asset('')}}/assets/js/shared/hoverable-collapse.js"></script>
    <script src="{{asset('')}}/assets/js/shared/misc.js"></script>
    <script src="{{asset('')}}/assets/js/shared/settings.js"></script>
    <script src="{{asset('')}}/assets/js/shared/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>