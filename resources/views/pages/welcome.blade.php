
    @extends('main')
    @section('ActiveHome','active')
    @section('title','| Homepage')


    @section ('stylesheet')

        <link rel="stylesheet" type="text/css" href="style.css">
    @endsection
    @section('content')

      <!-- end of header .row -->

      <div class="row">
        <div class="col-md-8">
        @foreach ($sekolah as $skul)                         
            <div class="post">
                <h3>{{$skul->nama}}</h3>
                @foreach($gambar as $gmbr)
                    @if($skul->id == $gmbr->sekolah_id)

                        <img src="{{asset('images/' . $gmbr->image)}}" height="400" width="800">
                        <a href="{{url('pages/'.$skul->id)}}" class="btn btn-primary">Read More</a>
                    @endif
                @endforeach
            </div>
        <hr>
        @endforeach
        </div>
    </div>

@endsection

@section('scripts')
@endsection
