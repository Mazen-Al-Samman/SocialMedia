@include('inc.header' , ['title' => $user->name])

<body class="bg-info">
    @include('inc.nav')
    <div class="container text-center">
        <div class="jumbotron cover">
            <h1>{{ $user->name }}</h1>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center text-light mt-5">Tweets</h1>
        <div class="row">
            <div class="col-md-12">
                @foreach ($user->tweets as $tweet)

                    <div class="row bg-light mt-3 p-5" id="div"
                        style="border-radius: 100px;box-shadow:5px 5px 5px blue ;">
                        <div class="col-md-4">
                            <img src="../storage/images/{{ $tweet->img }}" alt=""
                                style="width: 300px;border-radius:50px" class="img-responsive">
                        </div>
                        <div class="col-md-8">
                            <h5 style="color: gray;letter-spacing:2px;">
                                {{ 'Date : ' . Str::substr($tweet->created_at, 0, 10) }}
                                <br>
                                {{ 'Time : ' . Str::substr($tweet->created_at, 11) }}
                            </h5>
                            <hr>
                            <h1>{{ $tweet->title }}</h1>
                            <h3 class="text-primary"> {{ $tweet->body }} </h3>
                            @if (auth()->user()->id == $user->id)
                                <a href="../tweets/{{ $tweet->id }}/edit" class="btn btn-success ml float-left">Edit</a>
                                {!! Form::open(['method' => 'post', 'action' => ['TweetsController@destroy',
                                $tweet->id], 'class' => 'mr float-right']) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br>
</body>

<style>
    .ml {
        margin-left: 80% !important;
    }

    .cover {
        margin-top: 1%;
        background-image: linear-gradient(to right, white, rgb(173, 160, 224));
        border-radius: 0px 100px !important;
    }

    @media only screen and (max-width: 600px) {
        .mr {
            margin-right: 30% !important;

        }

        .ml {
            margin-left: 30$ !important;
        }

</style>

</html>
