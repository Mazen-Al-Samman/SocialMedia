@include('inc.header' , ['title' => 'Edit a tweet'])

<body class="bg-info">
    @include('inc.nav')
    <div class="container">
        <div class="row text-center mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-8 p-5 bg-light" style="border: 2px solid #721B65; border-radius:100px;">
                {!! Form::open(['method' => 'put', 'action' => ['TweetsController@update', $tweet->id], 'class' =>
                'form-group', 'enctype' => 'multipart/form-data']) !!}
                {!! Form::label('title', 'Title', ['class' => 'primary']) !!}
                {!! Form::text('title', $tweet->title, ['class' => 'form-control input', 'placeholder' => 'Title']) !!}

                {!! Form::label('body', 'Body', ['class' => 'mt-3 primary']) !!}
                {!! Form::textarea('body', $tweet->body, ['class' => 'form-control input', 'placeholder' => 'Body']) !!}

                {!! Form::file('img', ['class' => 'mt-3']) !!}
                <br>

                {!! Form::submit('Tweet', ['class' => 'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <br><br>
</body>
<style>
    .primary {
        color: #721B65;
        font-weight: bold;
        font-size: 25px;
        letter-spacing: 3px;
    }

    .input {
        border: 2px solid #BB0D57;
        color: #BB0D57;
    }

</style>

</html>
