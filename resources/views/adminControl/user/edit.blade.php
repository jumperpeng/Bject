@extends('layouts.adminapp')

@section('content')

<h1>Account Control User : Edit</h1>
<hr>


<form action="{{ action('App\Http\Controllers\Admin\UserController@store',$users->id ) }}" method="POST"
    class="mt-2 text-center">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field()}}

    <div class="row">
        <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
    </div>
    <div class=" col-md-6">
        <input type="text" value="{{$users->name}}" class="form-control" id="adminname" name="name">
    </div>

    <div class="row text-md-left">
        <label for="username" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>
    </div>
    <fieldset disabled>
        <div class="col-md-6">
            <input type="text" value="{{$users->username}}" class="form-control" id="userusername" name="username">
        </div>
    </fieldset>

    <div class="row">
        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
    </div>
    <div class="col-md-6">
        <input type="email" value="{{$users->email}}" class="form-control" id="useremail" name="email">
    </div>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="text-left">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </div>

</form>




@endsection
