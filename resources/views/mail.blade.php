@include('inc.header' , ['title' => 'Send an Email'])

<div class="container">
    @include('inc.nav')

    {!! Form::open(['action' => 'EmailController@store', 'method' => 'post', 'class' => 'form-group']) !!}

    {!! Form::label('mail', 'Email', ['class' => 'h4 mt-5']) !!}
    {!! Form::text('mail', '', ['class' => 'mt-3 form-control', 'placeholder' => 'Email']) !!}

    {!! Form::submit('Send an Email', ['class' => 'btn btn-success mt-3']) !!}

    {!! Form::close() !!}

    @error('mail')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

</div>
