@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
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
                <dt>Status Sekolah :</dt>
                <dd>{{$sekolah->status}}</dd>
            </div>
        </div> 
    </div>


    
@endsection
