@extends('layouts.app')


@section('content')

    <h1>Edit Blog</h1>
    {{ Form::open(['action' => ['App\Http\Controllers\PostsController@update', $posts->id], 'method' => 'POST'])}}

        <div class="form-group">
            {{ Form::label('title', 'Title')}}
            {{ Form::text('title', $posts->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{ Form::label('body', 'Description')}}
            {{ Form::textarea('body', $posts->body, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Update
          </button>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Update</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Do you want to update ?
                </div>
                <div class="modal-footer">
                    {{ Form::hidden('_method', 'PUT')}}
                    {{ Form::submit('Close', ['Class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                    {{ Form::submit('Save changes', ['Class' => 'btn btn-success']) }}

                </div>
              </div>
            </div>
          </div>



    {{ Form::close()}}

@endsection
