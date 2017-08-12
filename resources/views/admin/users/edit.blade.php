@extends('layouts.admin')

@section('content')
    <h1>Edit User</h1><br>
    <a class="btn btn-info" href="{{ route('admin.users.index') }}"> « Back to Users</a>
    <hr>

    <div class="col-md-4">
        <img class="img-responsive img-rounded" src="{{ $user->photo ? $user->photo->path : asset('img/misteryman.jpg') }}" />
    </div>

    <div class="col-md-8">
        @include('includes.form_error')

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'User Name *') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'User Email *') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'User Role *') !!}
                {!! Form::select('role_id', $roles, null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Upload photo') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('password', 'User Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}

    </div>
@endsection
