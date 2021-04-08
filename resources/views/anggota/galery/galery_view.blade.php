@extends('layouts.member',['title' => 'Galery Anggota UMKM'])
@section('header')
<link rel="stylesheet" href="{{asset('')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Galery</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="formSubmit" onSubmit="event.preventDefault()">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label for="kepada">Nama Galery </label>
                                <input type="text" class="form-control" name="nama_galery" id="nama_galery" maxlength="100"
                                    placeholder="Masukkan Nama Galery">
                                <small class="text-danger nama_galery"></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan"></textarea>
                                <small class="text-danger keterangan"></small>
                            </div>
                        </div>
                        <div id="detail-galery" class="row">
                            <div class="form-group col-md-12">
                                <label for="galery">Galery * </label>
                                <button type="button" class="btn btn-success btn-sm btn-tambah-galery"><i
                                        class="fa fa-plus"></i></button>
                                <input type="file" name="galery[]" id="galery" class="form-control"
                                    placeholder="Masukkan Barang">
                                <span class="help-block galery"></span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-md col-md-12" id="btn-tambah"><i
                                class="fa fa-plus"></i> Tambah Galery</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data galery</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Table galery</h4>
                    <div class="table-responsive">
                        <table id="table-galery" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No #</th>
                                    <th>Nama galery</th>
                                    <th>Keterangan</th>
                                    <th>Detail galery</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <table class="table table-hover table-bordered table-striped" >
            <thead>
                <tr>
                    <th>Nama barang</th>
                    <th>Deksripsi</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody id="table-detail"></tbody>
          </table>
        </div>
        <div class="modal-footer">
            <h5 class="modal-title" id="total-nilai"></h5>
        </div>
      </div>
    </div>
  </div>


@stop
@section('footer')
<script type="text/javascript">
    const simpan = () => {
        let form = $('#formSubmit')[0];
        let formData = new FormData(form);
        $.ajax({
            url:"{{route('simpan.galery')}}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            beforeSend: function () {
                loading();
            },
            success: function (data) {
                matikanLoading();
                if ($.isEmptyObject(data.errors)) {
                    $.each(data.success, function (key) {
                        hapusvalidasi(key);
                    });
                    swal({
                        title: "Pesan!",
                        text: "Anda Telah Berhasil Menyimpan galery !",
                        icon: "success",
                    })
                    form.reset();
                } else {
                    $.each(data.errors, function (key, value) {
                        hapusvalidasi(key);
                        let pesan = $(`#` + key);
                        let text = $('.' + key);
                        pesan.addClass('is-invalid');
                        text.text(value);
                    });
                    swal({
                        title: "Pesan!",
                        text: "dimohon form galery dengan benar !",
                        icon: "error",
                    });
                }
                $('#table-galery').DataTable().ajax.reload();
            },
            error: function () {
                matikanLoading();
                alert('terdapat kesalahan diserver');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {

        const numberRow = [];
        $('.btn-tambah-galery').click(function () {
            let div = $('#detail-galery');
            let number = numberRow.length;
            numberRow.push(`number-${number}`);
            let numberElement = `number-${number}`;
            div.append(`
           <div class="form-group col-md-8 ${numberElement}" >
            <label>Galery</label>
              <input type="file" name="galery[]" id="galery" class="form-control">
              <span class="help-block galery"></span>
          </div>
           <div class="form-group col-md-4 ${numberElement}" data-element="${numberElement}">
            <label for="foto"> Hapus Baris </label>
              <button type="button" class="btn btn-danger delete-row"><i class="fa fa-trash"></i></button>
          </div>
        `);
        });

        $('body').on('click', '.delete-row', function () {
            let self = $(this).parent();
            let data = self.data('element');
            numberRow.filter(function (d) {
                return d !== data;
            })
            self.siblings(`.${data}`).remove();
            self.remove();
        });

        $('#btn-tambah').click(simpan);

        $('body').on('click', '.btn-delete', function () {
            swal({
                title: "Apakah Kamu Yakin ingin Menghapus Data galery ini ?",
                text: "Setelah dihapus anda tidak dapat memulihkan data ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then(willDelete => {
                if (willDelete) {
                    loading();
                    const url = "{{url('anggota/delete/galery')}}" + "/" + $(this).data('id');
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            matikanLoading();
                            swal({
                                title: "Pesan!",
                                text: data.message,
                                icon: "success",
                            })
                            $('#table-galery').DataTable().ajax.reload();
                        })
                        .catch(err => console.error(err));
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        })

        $('body').on('click','.btn-status',function(){
            swal({
                title: "Apakah Anda ingin Mengubah status Data galery ini ?",
                text: "Setelah diubah anda tidak dapat mengembalikannya status ini!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then(willChange => {
                if (willChange) {
                    loading();
                    const url = "{{url('status/galery')}}" + "/" + $(this).data('id');
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            matikanLoading();
                            swal({
                                title: "Pesan!",
                                text: data.message,
                                icon: "success",
                            }).then(function(){
                                window.location.href="{{url('keuangan')}}";
                            })
                            $('#table-galery').DataTable().ajax.reload();
                        })
                        .catch(err => console.error(err));
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        });


        $('#table-galery').DataTable({
            responsive:true,
            processing:true,
            serverSide:true,
            ajax:"{{route('table.galery')}}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'nama_galery',
                    name: 'nama_galery'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'galery_view',
                    name: 'galery_view'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            "order": [
                [0, "desc"]
            ],
        })

    });

</script>
@endsection
