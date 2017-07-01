@extends('main')

@section('title', '| Create Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::open(['route'=>'sekolahs.store','files'=> true]) !!}
				{{ Form::label('nama','Nama Sekolah')}}
				{{ Form::text('nama', null, ['class' =>'form-control'])}}
				{{ Form::label('alamatSekolah', 'Alamat Sekolah')}}
				{{ Form::text('alamat',null,['class'=> 'form-control'])}}
				{{ Form::label('KategoriSekolah', 'Kategori Sekolah')}}
				{{ Form::select('kategori', ['SD' => 'SD','SMP' => 'SMP','SMA' => 'SMA']) }}
				{{Form::label('deskripsi','Deskripsi : ',['class'=>'form-spacing-top'])}}
				{{ Form::textarea('deskripsi',null,['class'=>'form-control','required'=>''])}}
				{{ Form::label('image', 'Upload Gambar')}}
				{!! Form::file('image[]',array('multiple' => true)) !!}
				{{ Form::text('userId',Auth::user()->id,['class'=>'hidden'])}}
				{{ Form::submit('Submit', array('class'=> 'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px'))}}
			{!! Form::close()!!}
		</div>

	</div>

	
@endsection

