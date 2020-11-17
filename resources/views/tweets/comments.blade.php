@include('inc.header' , ['title' => 'Comment page'])

<script>


</script>

<body class="bg-info">
    @include('inc.nav')

    <div class="container text-center">
        <div class="row bg-light p-5 mt-3 rounded border border-dark">
            <div class="col-md-12">
                <h3 style="color: gray">{{ $tweets->user->name }}</h3>
                <small class="mr">{{ Str::substr($tweets->created_at, 0, 10) }}</small>
                <small class="ml">{{ Str::substr($tweets->created_at, 11) }}</small>
                <hr>
                <h1 class="text-dark">{{ $tweets->title }}</h1>
                <h3 class="text-primary"> {{ $tweets->body }} </h3>

                <br>
                <img src="../storage/images/{{ $tweets->img }}" alt="" style="width: 300px" class="img-responsive">
                <br><br>
                <button style="display: none" id="like" class="btn btn-primary wid2" style="background-color: blue"
                    onclick="like(<?php echo auth()->user()->id; ?> , <?php echo $tweets->id; ?>)">Like</button>
                <input type="hidden" id="user" value="<?php echo auth()->user()->id; ?>">
                <input type="hidden" id="tweet" value="<?php echo $tweets->id; ?>">
                <br>
                @if (auth()->user()->id == $tweets->user->id)
                    <a href="{{ $tweets->id }}/edit" class="btn btn-success float-right">Edit</a>
                    {!! Form::open(['method' => 'post', 'action' => ['TweetsController@destroy', $tweets->id], 'class'
                    => 'float-right']) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
                <br>
                <br>
                {!! Form::open(['method' => 'post', 'action' => 'CommentsController@store', 'class' => 'form-group'])
                !!}
                @csrf
                {!! Form::hidden('tweet', $tweets->id) !!}
                {!! Form::label('comment', 'Type Comment', ['class' => 'float-left h6']) !!} <br><br>
                {!! Form::text('comment', '', ['class' => 'form-control wid float-left', 'placeholder' => 'Comment'])
                !!}
                {!! Form::submit('Add', ['class' => 'btn btn-success wid2']) !!}
                {!! Form::close() !!}
                <br>
                <button onclick="show()"
                    class="btn btn-dark mt-3">{{ 'Comments (' . count($tweets->comments) . ')' }}</button>
                <div id="comments">
                    <hr>
                    <h3>Comments</h3>
                    <br>
                    @foreach ($tweets->comments as $comment)
                        <div class="bg-success p-5 mt-3 text-light">
                            <h3>{{ $comment->user->name }}</h3>
                            <hr class="bg-light">
                            <p>{{ $comment->comment }}</p>
                            <small class="float-left">{{ $comment->created_at }}</small><br>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <br><br>
</body>
<style>
    .ml2 {
        margin-left: 87% !important;
    }

    .mr {
        margin-right: 35% !important;
    }

    ml {
        margin-left: 35% !important;
    }

    .wid {
        width: 75% !important;
    }

    .wid2 {
        width: 23% !important;
    }

    @media only screen and (max-width: 1200px) {
        .mr {
            margin-right: 30% !important;
        }

        .ml2 {
            margin-left: 62% !important;
        }

</style>

</html>

<script>
    $(document).ready(function() {
        $('#comments').hide();
        color();
        $('#like').css('display', 'inline')
    });

    function show() {
        $('#comments').toggle(1000);
    }

    function color() {
        var user = $('#user').val();
        var tweet = $('#tweet').val();
        $.ajax({
            url: '../color/user/' + user + '/tweets/' + tweet,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data == 1) {
                    $('#like').css("background-color", 'green');
                    $('#like').html('UnLike');
                } else {
                    $('#like').css("background-color", 'blue');
                    $('#like').html('Like');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                $('#like').css("background-color", 'blue');
                $('#like').html('Like');
            }
        });
    }

    function like(user, tweet) {
        $.ajax({
            url: '../likes/user/' + user + '/tweets/' + tweet,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data == 1) {
                    $('#like').css("background-color", 'green');
                    $('#like').html('UnLike');
                } else {
                    $('#like').css("background-color", 'blue');
                    $('#like').html('Like');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                $('#like').css("background-color", 'blue');
                $('#like').html('Like');
            }
        });
    }

</script>
