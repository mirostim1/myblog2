@extends('layouts.admin')

@section('content')
       <h1>Categories</h1><br>
       <hr>

          <div class="col-md-12">
              @include('includes.session')
          </div>

          <div class="col-md-5">
             <h2>Create New Category</h2>
             <hr>
             @include('includes.form_error')

                {!! Form::open(['method'=>'POST', 'action'=> 'AdminCategoriesController@store']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Enter Category Name *') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Create Category', ['class'=>'btn btn-success']) !!}
                {!! Form::close() !!}
          </div>

          @if(count($categories) > 0)
          <div class="col-md-7">
            <h2>All Categories List</h2>
            <hr>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                  <td>{{ $category->created_at->diffForHumans() }}</td>
                  <td>{{ $category->updated_at->diffForHumans() }}</td>
                  <td>
                      {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @else
              <h2>No categories for display.</h2>
          @endif
          </div>
@endsection