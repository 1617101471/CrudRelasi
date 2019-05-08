@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Obat
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('obat.update',$obats->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_obat') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Obat</label>	
			  			<input type="text" name="nama_obat" class="form-control" value="{{ $obats->nama_obat }}"  required>
			  			@if ($errors->has('nama_obat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_obat') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('aturan_makan') ? ' has-error' : '' }}">
			  			<label class="control-label">Aturan Makan</label>	
			  			<input type="text" name="aturan_makan" class="form-control" value="{{ $obats->aturan_makan }}"  required>
			  			@if ($errors->has('aturan_makan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('aturan_makan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tanggal_kadaluarsa') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Kadaluarsa</label>	
			  			<input type="date" name="tanggal_kadaluarsa" class="form-control" value="{{ $obats->tanggal_kadaluarsa }}"  required>
			  			@if ($errors->has('tanggal_kadaluarsa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_kadaluarsa') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">Harga</label>	
			  			<input type="number" name="harga" class="form-control" value="{{ $obats->harga }}"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Edit</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection