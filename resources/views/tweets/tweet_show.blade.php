@include('inc.header' , ['title' => 'Tweets page'])

<body class="bg-info">
    @include('inc.nav')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (count($tweets) > 0)
                    @foreach ($tweets as $tweet)
                        <div class="row bg-light mt-5 p-5" id="div"
                            style="border-radius: 100px;box-shadow:5px 5px 5px blue ;">
                            <div class="col-md-4">
                                <img src="storage/images/{{ $tweet->img }}" alt=""
                                    style="width: 300px;border-radius:50px" class="img-responsive">
                            </div>
                            <div class="col-md-8">
                                <h4><a style="color: gray" href="/home/{{ $tweet->user_id }}">{{ $tweet->name }}</a>
                                </h4>
                                <hr>
                                <h1><a class="text-dark" href="tweets/{{ $tweet->id }}">{{ $tweet->title }}</a></h1>
                                <h3 class="text-primary"> {{ $tweet->body }} </h3>
                                <small>Created at {{ $tweet->created_at }}</small>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <br><br>
</body>
<style>
    @media only screen and (max-width: 600px) {
        #div {
            border-radius: 25px !important;
        }

    }

</style>

</html>
