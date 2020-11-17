@include('inc.header' , ['title' => 'Tweets page'])

<body class="bg-info">
    @include('inc.nav')

    <div class="container text-center">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 bg-light p-5 mt-3 rounded border border-dark">
                <h3 style="color: gray">{{ $tweets->user->name }}</h3>
                <small class="mr">{{ Str::substr($tweets->created_at, 0, 10) }}</small>
                <small class="ml">{{ Str::substr($tweets->created_at, 11) }}</small>
                <hr>
                <h1 class="text-dark">{{ $tweets->title }}</h1>
                <h3 class="text-primary"> {{ $tweets->body }} </h3>

                <br>
                <img src="../storage/images/{{ $tweets->img }}" alt="" style="width: 300px" class="img-responsive">
                <br><br>
                @if (auth()->user()->id == $tweets->user->id)
                    <a href="{{ $tweets->id }}/edit" class="btn btn-success float-left ml">Edit</a>
                    {!! Form::open(['method' => 'post', 'action' => ['TweetsController@destroy', $tweets->id], 'class'
                    => 'float-right mr']) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
    <br><br>
</body>
<style>
    .ml {
        margin-left: 35% !important;
    }

    .mr {
        margin-right: 35% !important;
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
