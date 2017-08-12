@extends('layouts.app2')

@section('content')
    <h1><i>CONTACT</i></h1>
    <hr>

    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <hr>
        <h4 align="right"><i>SEND A MESSAGE</i></h4>
        <hr>
        @include('includes.form_error')
        @include('includes.session')
        {!! Form::open(['method' => 'POST', 'action' => 'Emails@create'], ['class' => 'form-group']) !!}
            {!! Form::label('email', 'Your email') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            {!! Form::label('message', 'Message') !!}
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
            <div class="send-button">
                {!! Form::submit('Send', ['class' => 'form-control btn btn-info btn-lg']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection