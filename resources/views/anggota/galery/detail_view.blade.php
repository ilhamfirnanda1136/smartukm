@extends('layouts.member',['title' => 'Galery Anggota UMKM'])
@section('header')
<link rel="stylesheet" href="{{asset('')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body float-right mb-5">
                    <a href="{{url('anggota/galery')}}" class="btn btn-success"><i class="fa fa-backward"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <?php $no=0; ?>
                            @foreach($galery->detailgalery as $detail)
                            <?php if ($no==0) {
					  		    $active='active';
					  	    }
                            else{
                                $active='';
                            } ?>
                            <li data-target="#demo" data-slide-to="{{$no++}}" class="{{$active}}"></li>
                            @endforeach
                        </ul>
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <?php $nomor=0;
					  		if ($galery->detailgalery->count()>1) {
					  			?>
                            @foreach($galery->detailgalery as $detail)
                            <div class="carousel-item {{ $nomor==0 ? 'active' : ''}}">
                                <img src='{{asset("images/galery/$detail->galery")}}' alt="Los Angeles" width="1100"
                                    height="400" class="img-responsive">
                            </div>
                            <?php $nomor++; ?>
                            @endforeach
                            <?php
					  		}
					  		else{
					  			?>
                            <div class="carousel-item active">
                                <img src='{{asset("image/no-image.png")}}' alt="Los Angeles" width="1100" height="400"
                                    class="img-responsive">
                            </div>
                            <?php
					  		}
					  	 ?>
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <table class="table table-hover mt-4 table-striped" >
						<tr>
							<td>Gallery</td>
							<td>:</td>
							<td>{{$galery->nama_galery}}</td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td>{{$galery->keterangan}}</td>
						</tr>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
@endsection
