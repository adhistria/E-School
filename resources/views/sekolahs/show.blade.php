
@extends('main')

@section('title', '| View Post')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>{{ $sekolah->nama }}</h1>
            <p>{{ $sekolah->alamat }}</p>
            <p> {{ $sekolah->kategori }}</p>
            <p> {{$sekolah->deskripsi}}</p>
            {{-- <p class="lead">{{ $sekolah->deskripsi}}</p> 
             --}}@foreach($gambar as $gmbr)
                @if($sekolah->id == $gmbr->sekolah_id)
                    <img src="{{asset('images/' . $gmbr->image)}}" height="400" width="800">
                @endif                
            @endforeach
        </div>
        <div class="col-md-3">
            <div class="well">
{{--                 <dl class="dl-horizontal"> --}}
                    <dt>Single Post : </dt>
                    <dd><a href="{{url('pages/'.$sekolah->id)}}" class="btn btn-primary">Read More</a></dd>
{{--                 </dl> --}}
                {{-- <dl class="dl-horizontal"> --}}
                    <dt>Created at : </dt>
                    <dd>{{date('M j,Y h:ia'),strtotime($sekolah->created_at)}}</dd>
{{--                 </dl> --}}
                {{-- <dl class="dl-horizontal"> --}}
                    <dt>Last Updated : </dt>
                    <dd>{{date('M j,Y h:ia'),strtotime($sekolah->updated_at)}}</dd>
{{--                 </dl> --}}
                <hr>
                <div class="row">
                    @if(Auth::user()->id == $sekolah->user_id)
                        <div class="col-sm-6">
                            {!! Html::linkRoute('sekolahs.edit','Edit',array($sekolah->id),array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open(['route'=>['sekolahs.destroy', $sekolah->id],'method'=>'DELETE']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Html::linkRoute('sekolahs.index','Show All Post',[],['class'=>'btn btn-primary btn-block btn-h1-spacing ']) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Html::linkRoute('sekolahs.adminUpdate','Update Status',[$sekolah->id],['class'=>'btn btn-primary btn-block btn-h1-spacing ']) !!}
                        </div>
                    @else
                        <div class="col-sm-6">
                            {!! Form::open(['route'=>['sekolahs.destroy', $sekolah->id],'method'=>'DELETE']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Html::linkRoute('sekolahs.index','Show All Post',[],['class'=>'btn btn-primary btn-block btn-h1-spacing ']) !!}
                        </div>
                    @endif
                    
                </div>
            </div>
            
        </div>      
    </div>

    
@endsection
