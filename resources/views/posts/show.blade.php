@extends('layouts.app')


@section('content')

    <h1>{{$posts->title}}</h1>

    <hr>
    <div class="pt-2 pb-5" style="border:2px hidden red; border-radius: 10px; background-color:rgb(230, 230, 230);">
        <h5 class="my-2 pt-2 pb-5" style="margin-left: 20px;">{{$posts->body}}</h5>
    </div>
    <div class="text-right">
        <small >Written on {{$posts->created_at}}</small>
    </div>
    <a href="/posts" class="btn btn-primary mt-3 pt-2">Back</a>
    <a href="/posts/{{$posts->id}}/edit" class="btn mt-3 pt-2" style="color:black; background-color:rgb(236, 175, 60);">Edit</a>

    {{ Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $posts->id],'method' => 'POST' ,'class' => 'text-right'])}}

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
        Delete
      </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-left">
              Do you want to delete ?
            </div>
            <div class="modal-footer">
                {{ Form::hidden('_method', 'DELETE')}}
                {{ Form::submit('Close', ['Class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            </div>
          </div>
        </div>
      </div>

    {{ Form::close()}}

@endsection
