@extends('layouts.template',['title' => 'Data Anggota UMKM '])
@section('header')
    <style>
        img {
            vertical-align: unset !important;
        }
    </style>
@stop
@section('content')
<div class="container">
        <div class="row justify-content-center">
             <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Anggota </h4>
                        <form action="" method="get" id="pusatSubmit">          
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($anggota as $m)
                                <div class="form-group col-lg-3 col-sm-12 col-md-4 ">
                                    <div class="card" style="width: 100%; height:100%;">
                                        <?php
                                            if($m->foto_anggota == null) {
                                                $foto = url('images/noimage.jpg');
                                            } else {
                                                $foto = url("images/anggota/".$m->foto_anggota);
                                            }
                                        ?>
                                        <img src="{{$foto}}" class="card-img-top" alt="{{$m->nama_anggota}}" style="height: 50%;">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$m->nama_anggota}}</h5>
                                           <h5 class="card-title">{{$m->email}}</h5>
                                          <p class="card-text">NO Anggota : {{$m->no_anggota}}</p>
                                          <button href="#" class="btn btn-sm btn-primary btn-detail" data-id="{{$m->id}}" ><i class="fa fa-info"></i></button>
                                          <button href="#" class="btn btn-sm btn-warning btn-update" data-id="{{$m->id}}" ><i class="fa fa-camera"></i></i></button>
                                           <button href="#" class="btn btn-sm btn-danger btn-password" data-id="{{$m->id}}" data-nama="{{$m->nama_anggota}}" data-user="{{$m->email}}"><i class="fa fa-key"></i></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $anggota->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="" method="post" id="formAnggota">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Anggota UMKM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body table-responsive"> 
                <center>     
                    <div class="d-inline p-2" id="qrcode" style="margin-left:-20px; "></div>
                    <div class="d-inline p-2" id="foto_anggota"></div>
                </center>
              <input type="hidden" name="id" id="idanggota">
              <table class="table table-hover table-bordered">
                   <tr>
                      <td>No Anggota</td>
                      <td>:</td>
                      <td id="no_anggota">
                      </td>
                  </tr>
                  <tr>
                      <td>Kategori Usaha</td>
                      <td>:</td>
                      <td>
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            @foreach($kategori as $k)
                                <option value="{{$k->id}}">{{$k->nama_kategori}}</option>
                            @endforeach
                        </select>
                      </td>
                  </tr>
                  <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><input type="text" name="nama_anggota" id="nama_anggota" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>No KTP</td>
                      <td>:</td>
                      <td><input type="text" name="no_ktp" id="no_ktp" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><input type="text" name="email" id="email" class="form-control"> <br> <small class="text-danger email"></small></td>
                  </tr>
                   <tr>
                      <td>Alamat Rumah</td>
                      <td>:</td>
                      <td><input type="text" name="alamat" id="alamat" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>Telepon</td>
                      <td>:</td>
                      <td><input type="text" name="no_telp" id="no_telp" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>Nama Usaha</td>
                      <td>:</td>
                      <td><input type="text" name="nama_usaha" id="nama_usaha" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>Alamat Usaha</td>
                      <td>:</td>
                      <td><input type="text" name="alamat_usaha" id="alamat_usaha" class="form-control"></td>
                  </tr>
                  <tr>
                      <td>Email Jsaha</td>
                      <td>:</td>
                      <td><input type="email" name="email_usaha" id="email_usaha" class="form-control"></td>
                  </tr> 
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="simpan-update-anggota">Save changes</button>
            </div>
          </div>
      </form>
    </div>
  </div>
  
  
  <!-- Modal -->
  <div class="modal fade" id="modal-foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <form action="" method="post" id="formUpload"  enctype="multipart/form-data" onsubmit="event.preventDefault()">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Update Foto Anggota</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <input type="hidden" name="id" id="id_foto">
               <div id="foto-update"></div>
               <div class="form-group">
                   <input type="file" name="foto_anggota" id="foto" accept=".jpg,.png,.jpeg" class="form-control">
               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" id="simpan-foto-update" class="btn btn-primary">Save changes</button>
           </div>
         </div>
     </form>
    </div>
  </div>

 <!-- Modal Password-->
  <div class="modal fade" id="modal-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
     <form action="" method="post" id="formUpload"  enctype="multipart/form-data" onsubmit="event.preventDefault()">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="title-password"></h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
               <input type="hidden" name="id" id="idpassword">
                <div class="form-group">
                   <label for="password">User</label>
                   <input type="text" id="user-edit-password" class="form-control" readonly >
               </div>
               <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" name="password" id="password" class="form-control" placeholder="masukkan password baru">
               </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="button" id="simpan-password" class="btn btn-primary">Save changes</button>
           </div>
         </div>
     </form>
    </div>
  </div>

@stop
@section('footer')
<script src="{{asset('js/qrcode.min.js')}}" ></script>
<script>
    $(document).ready(function(){
        const url = "{{url('')}}";
        $('body').on('click','.btn-password',function(){
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            $('#idpassword').val(id);
            $('#title-password').text(`Reset Password Anggota UMKM: ${nama} `);
            $('#user-edit-password').val($(this).data('user'));
            $('#modal-password').modal({backdrop:'static'});
        });

        $('#simpan-password').click(function(){
            loading();
            const url = "{{url('anggota/change/password')}}";
            const datas = {
                id : $('#idpassword').val(),
                password:$('#password').val()
            }
            fetch(url, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                  },
                  body: JSON.stringify(datas)
              }).then(res => res.json())
                .then(data => {
                     matikanLoading();
                     swal({
                            title: "Pesan!",
                            text: data.message,
                            icon: "success",
                        }).then(function(){
                            location.reload();
                        });
                }); 
        });
        
        $('body').on('click','.btn-update',function(){
            const id = $(this).data('id');
            $.ajax({
                url:"{{url('anggota/detail')}}",
                method:"GET",
                data:{
                    id:id
                },
                dataType:'JSON',
                success:function(data) {
                    const {foto_anggota} = data;
                    $('#id_foto').val(id);
                    if(foto_anggota != null)
                    {
                        $('#foto-update').html(`<img src="${url}/images/anggota/${foto_anggota}" width="120px">`);
                    } else {
                        $('#foto-update').html(`<img src="{{url('images/noimage.jpg')}}" width="120px">`);
                    }
                    $('#modal-foto').modal({backdrop:'static'});
                }
            })
        });

        $('#simpan-foto-update').click(function(){
            let form = $('#formUpload')[0];
            let formData = new FormData(form);
            const urlOBJ = `${url}/anggota/update/foto/admin`;
            loading();
            $.ajax({
                url:urlOBJ,
                method:"POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                contentType: false,
                processData: false,
                dataType:'JSON',
                data:formData,
                beforeSend: function () {
                    loading();
                },
                success:function(data) {
                    matikanLoading();
                    swal({
                        title: "Pesan!",
                        text: data.message,
                        icon: "success",
                    }).then(function(){
                        location.reload();
                    });
                }
            });
        });

        $('body').on('click','.btn-detail',function(){
            const id = $(this).data('id');
            $('#qrcode').children().remove();
            $.ajax({
                 url:"{{url('anggota/detail')}}",
                  method:'GET',
                  data : {
                    id :id,
                  },
                  dataType:'JSON',
                  success:function(data) {
                    const {alamat,alamat_usaha,email,email_usaha,foto_anggota,kategori:{nama_kategori},kecamatan:{nama_kecamatan,kota:{nama_kota}},nama_anggota,nama_usaha,no_anggota,no_telp,kategori_id,no_ktp} = data;
                    // $('#kd_daerah').html('');
                    // const data = datas.anggota;
                    // for (let i = 0; i < Object.keys(datas.daerah).length; i++) {
                    //     $('#kd_daerah').append($('<option>').text(datas.daerah[i].kd_daerah).attr('value', datas.daerah[i].kd_daerah));
                    // }
                    $('#idanggota').val(id);
                    $('#qrcode').html('');
                    $('#qrcode').qrcode({
                        width: 128,
                        height: 128,
                        text: data.kd_pst+"."+data.kd_daerah+"."+data.no_urut
                    });
                    $('#nama_anggota').val(nama_usaha);
					$('#kategori_id').val(kategori_id);
                    $('#no_anggota').val(no_anggota);
                    $('#email').val(email);
                    $('#no_ktp').val(no_ktp);
                    $('#nama_usaha').val(nama_usaha);
                    $('#alamat_usaha').val(alamat_usaha);
                    $('#email_usaha').val(email_usaha);
                    $('#alamat').val(alamat);
                    $('#no_telp').val(no_telp);
                    if(foto_anggota != null)
                    {
                        $('#foto_anggota').html(`<img src="${url}/images/anggota/${foto_anggota}" width="120px">`);
                    } else {
                        $('#foto_anggota').html(`<img src="{{url('images/noimage.jpg')}}" width="120px">`);
                    }
                    $('#modal-detail').modal({backdrop: 'static', keyboard: false});
                  }
            })  
        });

        $('#simpan-update-anggota').click(function(){
            let form = $('#formAnggota')[0];
            let formData = new FormData(form);
            $.ajax({
                url : "{{route('simpan.anggota.update.admin')}}",
                method:'POST',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                data :formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType:'JSON',
                beforeSend: function () {
                    loading();
                },
                success:function(data) {
                    matikanLoading();
                    if ($.isEmptyObject(data.errors)) 
                    {
                        swal({
                            title: "Pesan!",
                            text: "Anda Telah Berhasil Mengupdate anggota !",
                            icon: "success",
                        }).then(function(){
                            location.reload();
                        });
                    }
                    else{
                    $.each(data.errors, function (key, value) {
            	            hapusvalidasi(key);
            	            let pesan = $(`#`+key);
            	            let text= $('.'+key);
            	            pesan.addClass('is-invalid');
            	            text.text(value);
            	    });
                    swal({
                            title: "Pesan!",
                            text: "dimohon isi dengan benar data anggota !",
                            icon: "error",
                            });
                    }
                }
            });
        });
    });
</script>
@endsection