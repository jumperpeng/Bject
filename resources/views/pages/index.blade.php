
@extends('layouts.app')


@section('content')

<div class="jumbotron text-center">
    <h1>Welcome To Bject</h1>
    <p>This is a Bject Application</p>
    <?php
            if(auth()->check()){
            echo 'access';
            }else{
                echo ' No access';
            }

    ?>
</div>


@endsection
