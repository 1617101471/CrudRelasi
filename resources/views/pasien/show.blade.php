@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pasien 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Pasien</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $posts->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Penyakit</label>
						<input type="text" name="penyakit" class="form-control" value="{{ $posts->penyakit }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Dokter</label>
						<input type="text" name="dokter" class="form-control" value="{{ $posts->dokter->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection