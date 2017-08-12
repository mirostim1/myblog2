@extends('layouts.admin')

@section('content')
       <h1>Users</h1><br>
       <a class="btn btn-info" href="{{ route('admin.users.create') }}">Create New User</a>
       <hr>

          @include('includes.session')

          @if(count($users) > 0)

          <form method="POST" action="{{ route('admin.delete.users') }}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger" name="delete_selected" value="Delete selected">Delete selected</button><br /><br />

          <div class="col-md-12">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th><input id="options" type="checkbox" name="checkBoxArray" value="Delete selected"></th>
                  <th>#</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $user->id }}"</td>
                  <td>{{ $user->id }}</td>
                  <td><img width="50px" height="50px" src="{{ $user->photo ? $user->photo->path : asset('img/misteryman.jpg') }}" /></td>
                  <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role->name }}</td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->updated_at->diffForHumans() }}</td>
                  <td>
                      <button type="submit" class="btn btn-danger" name="delete_single" value="{{ $user->id }}">Delete user</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </form>

          <div class="row">
              <div class="col-sm-6 col-sm-offset-5">
                  {{ $users->render() }}
              </div>
          </div>

          @else
              <h2>No users for display.</h2>
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
