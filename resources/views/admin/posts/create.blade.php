@extends('layouts.admin')

@section('content')
    <h1>Create New Post</h1><br>
    <a class="btn btn-info" href="{{ route('admin.posts.index') }}"> « Back to Posts</a>
    <hr>

    <div class="col-md-12">
        @include('includes.form_error')

        {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Enter Title *') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Enter Body *') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Choose category *') !!}
                {!! Form::select('category_id', ['' => 'Choose option'] + $categories, null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Upload photo') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>
                {!! Form::hidden('user_id', $user->id) !!}
            <div class="form-group">
                {!! Form::submit('Create Post', ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection