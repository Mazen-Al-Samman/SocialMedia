@include('inc.header' , ['title' => 'Home'])

<body>
    @include('inc.nav')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ auth()->user()->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @foreach ($tweets as $tweet)

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 bg-light p-5 mt-3 text-center">
                                    <h1 class="text-dark">{{ $tweet->title }}</h1>
                                    <h3 class="text-primary"> {{ $tweet->body }} </h3>
                                    <small>Created at {{ $tweet->created_at }}</small><br><br>
                                    <br>
                                    <img src="storage/images/{{ $tweet->img }}" alt="" style="width: 300px"
                                        class="img-responsive">
                                    <br><br>
                                    <a href="tweets/{{ $tweet->id }}/edit"
                                        class="btn btn-success float-right ml">Edit</a>
                                    {!! Form::open(['method' => 'post', 'action' => ['TweetsController@destroy',
                                    $tweet->id], 'class' => 'float-right']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .ml {
        margin-left: 1%;
    }

</style>

</html
