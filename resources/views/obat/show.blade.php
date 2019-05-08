@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Obat 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Obat</label>	
			  			<input type="text" name="nama_obat" class="form-control" value="{{ $obats->nama_obat }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Aturan Makan</label>	
			  			<input type="text" name="aturan_makan" class="form-control" value="{{ $obats->aturan_makan }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Tanggal Kadaluarsa</label>	
			  			<input type="text" name="tanggal_kadaluarsa" class="form-control" value="{{ $obats->tanggal_kadaluarsa }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Harga</label>	
			  			<input type="text" name="harga" class="form-control" value="Rp. {{ $obats->harga }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection