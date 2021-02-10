@extends('layout.adminapp')

@section('content')

        <h1>Account Control Admin : Edit</h1>
        <hr>

        <form action="{{ action('App\Http\Controllers\Admin\AdminController@store',$admins->id ) }}" method="POST" class="mt-2 text-center">
        <input type="hidden" name="_method" value="PUT">
            {{ csrf_field()}}

            <div class="row">
                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
            </div>
            <div class=" col-md-6 form-control">
                <input type="text" value="{{$admins->name}}" class="form-control" id="adminname" name="name">
            </div>

            <div class="row text-md-left">
                <label for="username" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>
            </div>
            <div class="col-md-6 form-control">
                <h5>{{ $admins->username}}</h5>
            </div>

            <div class="row">
                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>
            </div>
            <div class="col-md-6 form-control">
                <input type="email" value="{{$admins->email}}" class="form-control" id="adminemail" name="email">
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

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>




@endsection
