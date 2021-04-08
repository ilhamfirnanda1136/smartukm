
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UMKM LOGIN </title>
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
  </head>
  <body>
    <div class="container-scroller">
     @if(Session::has('successMSG'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil &nbsp</strong>{{session('successMSG')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <img src="{{asset('')}}/images/logo2.png" alt="logo asppi" class="text-center center" width="60%" style="margin-left:100px;">
                {{-- <img src="{{asset('')}}/images/logologin.png" alt="logo siska" class="text-center center" width="50%"  style="margin-left:90px;"> --}}
                  <h4 class="text-center">SISTEM INFORMASI KEANGGOTAAN UMKM</h4>
                <form action="{{ route('login') }}" method="post" class="user" >
                  @csrf
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukkan Username" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                    @error('username')<small class="text-danger">{{$message}}</small>@enderror
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
                    @error('password')<small class="text-danger">{{$message}}</small>@enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                  </div>
                  <small class="text-center" style="margin-left: 116px;"></small>
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