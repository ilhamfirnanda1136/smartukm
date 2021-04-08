@extends('layouts.member',['title'=>'Profil Anggota UMKM'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Anggota ASPPI</h4>
                </div>
                <div class="card-body table-responsive">
                    <?php
                            if($anggota->foto_anggota == null) {
                                $foto = url('images/noimage.jpg');
                            } else {
                                $foto = url("images/anggota/".$anggota->foto_anggota);
                            } 
                        ?>
                    <center>
                        <div class="d-inline p-2 mb-2" id="foto">
                            <img src="{{$foto}}" width="120px">
                            <button class="btn btn-md btn-warning" data-id="{{$anggota->id}}" id="btn-update"><i
                                    class="fa fa-camera"></i></button>
                        </div>
                    </center>
                    <form action="" method="post">
                        @csrf
                        <input type="hidden" name="id" id="idanggota" value="{{$anggota->id}}">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>No Anggota</td>
                                <td>:</td>
                                <td id="no_anggota">
                                    {{$anggota->no_anggota}}
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori Usaha</td>
                                <td>:</td>
                                <td>
                                    <select name="kategori_id" id="kategori_id" class="form-control">
                                        @foreach($kategori as $k)
                                        <option value="{{$k->id}}"
                                            {{$anggota->kategori_id == $k->id ? 'selected' : ''}}>{{$k->nama_kategori}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><input type="text" name="nama_anggota" id="nama_anggota" class="form-control"
                                        value="{{$anggota->nama_anggota}}"></td>
                            </tr>
                            <tr>
                                <td>No KTP</td>
                                <td>:</td>
                                <td><input type="text" name="no_ktp" id="no_ktp" class="form-control" value="{{$anggota->no_ktp}}"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="text" name="email" id="email" class="form-control" value="{{$anggota->email}}"> <br> <small
                                        class="text-danger email"></small></td>
                            </tr>
                            <tr>
                                <td>Alamat Rumah</td>
                                <td>:</td>
                                <td><input type="text" name="alamat" id="alamat" class="form-control" value="{{$anggota->alamat}}"></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td><input type="text" name="no_telp" id="no_telp" class="form-control" value="{{$anggota->no_telp}}"></td>
                            </tr>
                            <tr>
                                <td>Nama Usaha</td>
                                <td>:</td>
                                <td><input type="text" name="nama_usaha" id="nama_usaha" class="form-control" value="{{$anggota->nama_usaha}}"></td>
                            </tr>
                            <tr>
                                <td>Alamat Usaha</td>
                                <td>:</td>
                                <td><input type="text" name="alamat_usaha" id="alamat_usaha" class="form-control" value="{{$anggota->alamat_usaha}}"></td>
                            </tr>
                            <tr>
                                <td>Email Jsaha</td>
                                <td>:</td>
                                <td><input type="email" name="email_usaha" id="email_usaha" class="form-control" value="{{$anggota->email_usaha}}"></td>
                            </tr>
                        </table>
                        <div class="row">
                            <button type="submit" class="btn btn-primary col-md-12 mt-2 mb-2"><i
                                    class="fa fa-plane"></i>Update Profil</button>
                            <a href="{{url('/anggota/change/password')}}" class="btn btn-danger col-md-12"><i
                                    class="fa fa-key"></i> Ganti Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="formUpload" enctype="multipart/form-data" onsubmit="event.preventDefault()">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div id="foto-update"></div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" accept=".jpg,.png,.jpeg" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="simpan-update" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>


@stop
@section('footer')
<script>
    $(document).ready(function () {
        $('body').on('click', '#btn-update', function () {
            const id = $(this).data('id');
            $.ajax({
                url: "{{url('detail/anggota')}}",
                method: "GET",
                data: {
                    id: id
                },
                dataType: 'JSON',
                success: function (datas) {
                    const data = datas.anggota;
                    $('#id').val(id);
                    if (data.foto != '') {
                        $('#foto-update').html(
                            `<img src="http://dpd.asppi.or.id/foto/${data.foto}" width="120px">`
                            );
                    } else {
                        $('#foto-update').html(
                            `<img src="{{url('images/noimage.jpg')}}" width="120px">`);
                    }
                    $('#modal-foto').modal({
                        backdrop: 'static'
                    });
                }
            })
        });

        $('#simpan-update').click(function () {
            let form = $('#formUpload')[0];
            let formData = new FormData(form);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                url: "https://dpd.asppi.or.id/updatefoto.php",
                beforeSend: function () {
                    loading();
                },
                success: function (data) {
                    matikanLoading();
                    if (data.status == 'success') {
                        $('#modal-foto').modal('hide');
                        swal({
                            title: "Pesan!",
                            text: data.messages,
                            icon: "success",
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        swal({
                            title: "Pesan!",
                            text: data.messages,
                            icon: "error",
                        })
                    }
                },
                error: function () {
                    matikanLoading();
                    alert('maaf ada kesalahan server');
                }
            })
        });
    })

</script>
@endsection
