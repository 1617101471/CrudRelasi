@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Pasien 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pasien.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Pasien</label>	
			  			<input type="text" name="nama" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('penyakit') ? ' has-error' : '' }}">
			  			<label class="control-label">Penyakit</label>	
			  			<input type="text" name="penyakit" class="form-control"  required>
			  			@if ($errors->has('penyakit'))
                            <span class="help-block">
                                <strong>{{ $errors->first('penyakit') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('dokter_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Dokter</label>	
			  			<select name="dokter_id" class="form-control">
			  				<option>Pilih Dokter</option>
			  				@foreach($posts as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('dokter_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dokter_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('obat') ? ' has-error' : '' }}">
			  			<label class="control-label">obat</label>	
			  			<select name="obat[]" class="form-control js-example-basic-multiple" multiple="multiple">
			  				@foreach($obats as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_obat }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('obat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('obat') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection