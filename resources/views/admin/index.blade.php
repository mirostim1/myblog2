@extends('layouts.admin')

@section('content')
    <h1>Dashboard</h1><br>
    <hr>

    <div class="col-md-6">
        <div class="alert alert-info">
            <a href="{{ route('admin.users.index') }}">Users</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="alert alert-warning">
           <a href="{{ route('admin.posts.index') }}">Posts</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="alert alert-success">
            <a href="{{ route('admin.categories.index') }}">Categories</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="alert alert-danger">
            <a href="{{ route('admin.medias.index') }}">Media files</a>
        </div>
    </div>
@endsection