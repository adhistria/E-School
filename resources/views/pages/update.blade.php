@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>{{ $sekolah->nama }}</h1>
            <p>{{ $sekolah->alamat }}</p>
            <p> {{ $sekolah->kategori }}</p>
            <p class="lead">{{ $sekolah->deskripsi}}</p> 
            @foreach($gambar as $gmbr)
                @if($sekolah->id == $gmbr->sekolah_id)
                    <img src="{{asset('images/' . $gmbr->image)}}" height="400" width="800">
                @endif                
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="well">
                <dt>Status : </dt>
                <dd>{{$sekolah->status}}</dd>
                {!! Form::model($sekolah,['route'=>['sekolahs.saveAdminUpdate',$sekolah->id],'method'=>'PUT','files'=> true]) !!}
                    {{ Form::label('StatusSekolah', 'Status Sekolah')}}
                    {{ Form::select('status', ['Diproses' => 'Diproses','DiBangun' => 'DiBangun','Selesai' => 'Selesai']) }}
                    {{ Form::submit('Submit', array('class'=> 'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px'))}}
                {!! Form::close()!!}
            </div>
        </div>
            
    </div>

    
@endsection
