@extends('layouts.admin')

@section('content')
       <h1>Messages</h1><br>
       <hr>

          @include('includes.session')

          @if(count($messages) > 0)

          <form method="POST" action="{{ route('admin.delete.emails') }}">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button type="submit" class="btn btn-danger" name="delete_selected" value="Delete selected">Delete selected</button><br /><br />

          <div class="col-md-12">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th><input id="options" type="checkbox" name="checkBoxArray" value="Delete selected"></th>
                  <th>#</th>
                  <th>Email</th>
                  <th>Title</th>
                  <th>Message text</th>
                  <th>Created date</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($messages as $message)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $message->id }}"</td>
                  <td>{{ $message->id }}</td>
                  <td>{{ $message->email }}</td>
                  <td>{{ $message->title }}</td>
                  <td>{{ str_limit($message->message, 150) }}</td>
                  <td>{{ $message->created_at->diffForHumans() }}</td>
                  <td>
                      <button type="submit" class="btn btn-danger" name="delete_single" value="{{ $message->id }}">Delete message</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </form>
      
          <div class="row">
              <div class="col-sm-6 col-sm-offset-5">
                  {{ $messages->render() }}
              </div>
          </div>

          @else
              <h2>No messages for display.</h2>
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
