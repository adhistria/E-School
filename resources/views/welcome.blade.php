<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 250vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    E-School
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>adhi</h1>
                         <a href="sekolahs/create">daftar sekolah</a>
                         {!! Html::linkRoute('sekolahs.index','Show All Post',[],['class'=>'btn btn-primary btn-block btn-h1-spacing ']) !!}
                        @foreach ($sekolah as $skul)                         
                         <div class="row">
                             <div class="col-md-8 col-md-offset-2">
                                @foreach($gambar as $gmbr)
                                    @if($skul->id == $gmbr->sekolah_id)
                                        <img src="{{asset('images/' . $gmbr->image)}}" height="400" width="800">
                                    @endif
                                @endforeach
                             </div>
                         </div>
                         <hr>
                         @endforeach
                    </div>
                    
                </div>


            </div>
        </div>
    </body>
</html>