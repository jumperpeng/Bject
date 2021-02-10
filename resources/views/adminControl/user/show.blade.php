@extends('layouts.adminapp')


@section('content')

<h1>Account Control User</h1>
<hr>

        <div class="row">
            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
        </div>
        <div class=" col-md-6 form-control">
            <h5>{{ $users->name}}</h5>
        </div>

        <div class="row text-md-left">
            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>
        </div>
        <div class="col-md-6 form-control">
            <h5>{{ $users->username}}</h5>
        </div>

        <div class="row">
            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
        </div>
        <div class="col-md-6 form-control">
            <h5>{{ $users->email}}</h5>
        </div>

<a href="{{ route('admin.accountuser.index')}}" class="btn btn-primary mt-3 pt-2">Back</a>
<a href="{{ route('admin.accountuser.edit', $users->id)}}" class="btn mt-3 pt-2"
    style="color:black; background-color:rgb(236, 175, 60);">Edit</a>


<form action="{{ action('App\Http\Controllers\Admin\UserController@destroy',$users->id ) }}" method="POST" class="mt-2 text-center">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
        Delete
    </button>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="btn btn-danger" value="delete">
            </div>
        </div>
    </div>
</div>
</form>

@endsection
