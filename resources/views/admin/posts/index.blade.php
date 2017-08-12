@extends('layouts.admin')

@section('content')
       <h1>Posts</h1><br>
       <a class="btn btn-info" href="{{ route('admin.posts.create') }}">Create New Post</a>
       <hr>

          @include('includes.session')

          @if(count($posts) > 0)

          <form method="post" action="{{ route('admin.delete.posts') }}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger" name="delete_selected" value="delete selected">Delete selected</button><br /><br />

          <div class="col-md-12">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th><input id="options" type="checkbox" name="checkBoxArray"></th>
                  <th>#</th>
                  <th>Photo</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>User</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($posts as $post)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $post->id }}"></td>
                  <td>{{ $post->id }}</td>
                  <td><img width="50px" height="50px" src="{{ $post->photo ? $post->photo->path : asset('img/code.jpg') }}" /></td>
                  <td>{{ $post->category->name }}</td>
                  <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                  <td>{{ str_limit($post->body, 100) }}</td>
                  <td>{{ $post->user->name }}</td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>{{ $post->updated_at->diffForHumans() }}</td>
                  <td>
                      <button type="submit" class="btn btn-danger" name="delete_single" value="{{ $post->id }}">Delete post</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </form>

          <div class="row">
              <div class="col-sm-6 col-sm-offset-5">
                  {{ $posts->render() }}
              </div>
          </div>
          @else
              <h2>No posts for display.</h2>
          @endif
          </div>
@endsection

@section('scripts')
<script>
    $('#options').click(function(){
        if(this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });
</script>
@endsection