@extends('layouts.template',['title' => 'Form Aprroval Anggota UMKM '])
@section('header')
<link rel="stylesheet" href="{{asset('')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">

@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Anggota Yang Harus DIApproval untuk Segera Diaktifkan</h4>
                    <div class="float-right">
                        <form method="get" action="" id="formSearch">
                          
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Data Anggota yang belum diAprroval</h4>
                    <div class="table-responsive">
                        <table id="table-anggota" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No #</th>
                                    <th>Biodata Calon Anggota</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Telpon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; ?>
                                    @foreach ($anggota as $a)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>  
                                                <img src="{{asset('images/noimage.jpg')}}" alt="{{$a->nama_anggota}}" style="width: 25%;
                                                height: 279%;float:left;margin-right:5px;">
                                                Nama : <b>{{$a->nama_anggota}}</b> <br>
                                                <b>email : </b>{{$a->email}} <br>
                                                <b>KTP : </b>{{$a->no_ktp}} <br>
                                                <b>Alamat : </b>{{$a->alamat}} <br>
                                                <b>Kabupaten : </b>{{$a->kecamatan->kota->nama_kota}} <br>
                                                <b>Kecamatan : </b>{{$a->kecamatan->nama_kecamatan}} <br>
                                                <hr><br>
                                                <b>Nama Usaha :</b> {{$a->nama_usaha}}<br>
                                                <b>Alamat usaha : </b>{{$a->alamat_usaha}} <br>
                                                <b>Email usaha : </b>{{$a->email_usaha}} <br>
                                            </td>
                                            <td>{{$a->kategori->nama_kategori}}</td>
                                            <td>{{$a->created_at->format('d-M-Y H:i:s')}}</td>
                                            <td>{{$a->no_telp}}</td>
                                            <td><button data-id="{{$a->id}}" class="btn btn-primary btn-lg btn-approve">Approve keanggotaan</button></td>
                                        </tr>                                        
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
@section('footer')
<script>
    $(document).ready(function(){
        $('#table-anggota').DataTable();

        $('body').on('click','.btn-approve',function(){
            const id = $(this).data('id');
            swal({
                title: "Yakin?",
                text: "anda akan menyetujui keanggotaan ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "{{url('anggota/approval/status/')}}/"+ id;
                } else {
                    swal("Anda membatalkan hapus data");
                }
            });
        });
    })
</script>
@endsection