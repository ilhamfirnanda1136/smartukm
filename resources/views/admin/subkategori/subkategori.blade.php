@extends('layouts.template',['title'=>'Sub kategori UMKM'])
@section('header')
@stop
@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabel Sub kategori </h3>
            <div class="pull-right">
            <button class="btn btn-success btn-md btn-tambah"><i class="fa fa-plus"></i> Tambah Sub kategori</button></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="table-kategori" class="table table-bordered  table-striped">
            <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kategori</th>
                <th>sub kategori</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($subkategori as $m)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$m->kategori->nama_kategori}}</td>
                        <td>{{$m->nama_subkategori}}</td>
                        <td><button data-id="{{$m->id}}" data-kategori="{{$m->kategori_id}}" data-subkategori="{{$m->nama_subkategori}}" class="btn-primary btn btn-sm btn-edit"><i class="fa fa-edit"></i></button> <a href="{{url('kategori/sub/hapus/')}}/{{$m->id}}" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
            <th>No</th>
            <th>kategori</th>
            <th>sub kategori</th>
            <th>Action</th>
            </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="modal-simpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" id="savekategori">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama kategori * </label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    @foreach($kategori as $k)
                    <option value="{{$k->id}}">{{$k->nama_kategori}}</option>
                    @endforeach
                </select>
                <span class="help-block kategori_id"></span>
            </div>
           <div class="form-group">
            <label for="nama">Nama sub kategori * </label>
            <input type="text" class="form-control" name="nama_subkategori" id="nama_subkategori" value="" placeholder="Masukkan Nama Sub kategori">
            <span class="help-block nama_subkategori"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="save" class="btn btn-primary col-md-12">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
@stop
@section('footer')
<script type="text/javascript">
function hapusvalidasi(key) 
{
    let pesan=$('#'+key);
    let text=$('.'+key);
    pesan.removeClass('is-invalid');
    text.text(null);
}

function simpan() {
  	let form=$('#savekategori')[0];
  	let formdata=new FormData(form);
  	$.ajax({
  		method :'POST',
  		url : "{{route('simpan.sub.kategori')}}",
  		 headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
  		data: formdata,
  		dataType:'JSON',
  		cache: false,
	    contentType: false,
	    processData: false,
	    beforeSend:function() {
	    	loading();
	    },
	    success:function(data){
	    	matikanLoading();
	    	if ($.isEmptyObject(data.errors)) 
        	{
        	   $.each(data.success,function(key){
                hapusvalidasi(key);
               });
                swal({
                    title: "Pesan!",
                    text: data.message,
                    icon: "success",
                }).then(function(){
                    location.reload();
                });
                form.reset();
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
	                text: "dimohon untuk mengisi semua data!",
	                icon: "error",
	                });
	            }
	        }
  	})
}

$(document).ready(function(){
    $('#table-kategori').DataTable();

     $('body').on('click','.btn-edit',function(){
       let id=$(this).data('id');
       let nama_subkategori=$(this).data('subkategori');
       let kategori_id = $(this).data('kategori');
       $('#id').val(id)
       $('#nama_subkategori').val(nama_subkategori);
       $('.modal-title').text('Edit Sub kategori');
       $('#modal-simpan').modal({backdrop: 'static', keyboard: false});
     });

     $('#save').click(function() {
        simpan();
     });

     $('.btn-tambah').click(function(){
     	$('.modal-title').text('Tambah Sub kategori');
     	$('#modal-simpan').modal({backdrop: 'static', keyboard: false});
     });

     $(document).keypress(
        function(event){
          if (event.which == '13') {
            event.preventDefault();
          }
      });
});

</script>

@endsection