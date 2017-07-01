
@extends('main')

@section('title', '| Edit Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			{!! Form::model($sekolah,['route'=>['sekolahs.update',$sekolah->id],'method'=>'PUT','files'=> true]) !!}
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
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created at : </dt>
					<dd>{{date('M j,Y h:ia'),strtotime($sekolah->created_at)}}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated : </dt>
					<dd>{{date('M j,Y h:ia'),strtotime($sekolah->updated_at)}}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('sekolahs.show','Cancel',array($sekolah->id),array('class'=>'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{Form::submit('submit',['class'=>'btn btn-success btn-block'])}}
					</div>
					
				</div>
			</div>
			
		</div>		
		{!! Form::close()!!}
	</div>

	
@endsection