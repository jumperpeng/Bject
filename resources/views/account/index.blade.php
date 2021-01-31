@extends('layouts.app')


@section('content')

    <h1>Account</h1>
    <table class="table">
        <thead class="thead-dark" style="border-style:solid;">
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

    </table>





    @if (count($users) > 0)
        @foreach ($users as $user)
            <div>
                <h3>{{$user->id}}</h3>
            </div>
        @endforeach
    @else
        <div>
            <h1>Not found Account </h1>
        </div>
    @endif

@endsection
