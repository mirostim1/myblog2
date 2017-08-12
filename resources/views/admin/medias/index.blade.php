@extends('layouts.admin')

@section('content')
       <h1>Media files</h1><br>
       <a class="btn btn-info" href="{{ route('admin.medias.create') }}">Upload Photos</a>
       <hr>

       @include('includes.session')

       @if(count($photos) > 0)
          <div class="col-md-12">
           <form action="{{ route('admin.delete.media') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input name="delete_selected" type="submit" class="btn btn-danger" value="Delete selected"><br /><br />
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><input id="options" type="checkbox" name="checkBoxArray"></th>
                  <th>#</th>
                  <th>Photo</th>
                  <th>Path</th>
                  <th>Created</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($photos as $photo)
                <tr>
                  <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                  <td>{{ $photo->id }}</td>
                  <td><img width="50px" height="50px" src="{{ $photo->path }}" /></td>
                  <td>{{ $photo->path }}</td>
                  <td>{{ $photo->created_at->diffForHumans() }}</td>
                  <td>
                      <button type="submit" name="delete_single" class="btn btn-danger" value="{{ $photo->id }}">Delete photo</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
           </form>

           <div class="row">
              <div class="col-sm-6 col-sm-offset-5">
                  {{ $photos->render() }}
              </div>
          </div>

          @else
              <h2>No photos for display.</h2>
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
