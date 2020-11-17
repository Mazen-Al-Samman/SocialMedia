@include('inc.header' , ['title' => 'Home'])

<body class="bg-info">
    @include('inc.nav')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 bg-light text-center p-5" style="border-radius:50px;">
                <h1 class="text-info">TWEETY</h1>
                <p>Welcome to tweety website , you can post , see and check!</p>
                <a href="{{ route('register') }}" class="btn btn-success">Register Now</a>
            </div>
        </div>
    </div>

</body>

</html>
