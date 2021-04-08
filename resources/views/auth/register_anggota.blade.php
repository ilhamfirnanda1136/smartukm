
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Anggota UMKM</title>
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
    <link rel="shortcut icon" href="{{asset('')}}/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center register-bg-1 theme-one mt-5">
          <div class="row w-10 mx-auto">
            <div class="col-lg-9 mx-auto">
              <img src="{{asset('')}}/images/logo2.png" alt="logo asppi" class="text-center center" width="30%" style="margin-left:410px;">
              <h2 class="text-center mb-4">Register Anggota UMKM</h2>
              <div class="auto-form-wrapper">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                         <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="text" name="no_ktp" class="form-control" placeholder="Nomor KTP">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                            <textarea type="text" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="kategori_id" id="" class="form-control" >
                                <option value="">--Pilih Kategori--</option>
                                @foreach($kategori as $k)
                                <option value="{{$k->id}}">{{$k->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                           <select name="kota_id" id="kota" class="form-control">
                               <option value="">Pilih Kota</option>
                               @foreach($kota as $k)
                                   <option value="{{$k->id}}">{{$k->nama_kota}}</option>
                               @endforeach
                           </select>
                           <small class="text-danger kota"></small>
                       </div>
                       <div class="form-group col-md-6">
                           <select name="kecamatan_id" id="kecamatan" class="form-control">
                               <option value="">--Pilih Kecamatan --</option>
                           </select>
                           <small class="text-danger kecamatan"></small>
                       </div>
                        <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                            <textarea type="text" name="alamat_usaha" class="form-control" placeholder="Alamat Usaha"></textarea>
                        </div>
                         <div class="form-group col-md-6">
                          <div class="input-group">
                            <input type="text" name="email_usaha" class="form-control" placeholder="Email Usaha">
                            <div class="input-group-append">
                              <span class="input-group-text">
                                <i class="mdi mdi-check-circle-outline"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                        </div>
                    </div>
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
    <script src="{{asset('')}}/assets/vendors/sweetalert/sweetalert.min.js"></script>
    <!-- endinject -->
    <script>

      @if(Session::has('sukses'))
       swal({
              title: "Pesan!",
              text: "{{Session::get('sukses')}}",
              icon: "success",
          });
      @endif

      $("#kota").change(function() {
          var kota = $("#kota").val();
          $.ajax({
              url: "{{url('api/data/kecamatan')}}",
              data: {
                  kota:kota
              },
              type: 'GET',
              cache: false,
              dataType: 'json',
              success: function(json) {
                  $("#kecamatan").html('');
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#kecamatan').append($('<option>').text(json.data[i].nama_kecamatan).attr('value', json.data[i].id));
                      }
                  } else {
                      $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
        });
    </script>
  </body>
</html>