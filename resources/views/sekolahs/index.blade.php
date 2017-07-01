@extends('main')
@section('title','| All Post')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All post</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('sekolahs.create')}}" class="btn btn-lg btn-primary btn-h1-spacing">Tambah Sekolah</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th ></th>
                </thead>
                <tbody>
                    @foreach ($sekolahs as $sekolah)                         
                        <tr>
                            @if(Auth::user()->status== 1)
                                <th>{{$sekolah->nama}}</th>
                                <td>{{$sekolah->alamat}}</td>
                                <td>{{$sekolah->kategori}}</td>
                                <td>{{$sekolah->deskripsi}}</td>
                                <td>{{$sekolah->status}}</td>
                                <td><a href="{{route('sekolahs.show',$sekolah->id)}}" class="btn btn-default">View</a>@if(Auth::user()->id==$sekolah->user_id)
                                 <a href="{{route('sekolahs.edit',$sekolah->id)}}" class="btn btn-default">Edit</a>
                                 @endif
                                 <a href="{{route('sekolahs.adminUpdate',$sekolah->id)}}" class="btn btn-default">Edit Status</a>
                                </td>
                            @elseif(Auth::user()->id == $sekolah->user_id)
                                <th>{{$sekolah->nama}}</th>
                                <td>{{$sekolah->alamat}}</td>
                                <td>{{$sekolah->kategori}}</td>
                                <td>{{$sekolah->deskripsi}}</td>
                                <td>{{$sekolah->status}}</td>
                                <td><a href="{{route('sekolahs.show',$sekolah->id)}}" class="btn btn-default">View</a><a href="{{route('sekolahs.edit',$sekolah->id)}}" class="btn btn -default">Edit</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>    
            </table>   
        </div>
    </div>
@stop
