@extends('layouts.admin')

@section('content')

    <h1>Edit Category Name</h1><br>
    <a class="btn btn-info" href="{{ route('admin.categories.index') }}"> « Back to Categories</a>
    <hr>

    <div class="col-md-12">
        @include('includes.form_error')

        {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Category Name *') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Category', ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection