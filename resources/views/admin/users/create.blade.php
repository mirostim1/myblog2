@extends('layouts.admin')

@section('content')
    <h1>Create New User</h1><br>
    <a class="btn btn-info" href="{{ route('admin.users.index') }}"> « Back to Users</a>
    <hr>

    <div class="col-md-12">
        @include('includes.form_error')

        {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Enter Name *') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Enter Email *') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Choose Role *') !!}
                {!! Form::select('role_id', ['' => 'Choose option'] + $roles, null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Upload photo') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Create Password *') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Create User', ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection