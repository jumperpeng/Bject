@extends('layouts.app')


@section('content')

    <h1>Blog</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="jumbotron">
                <h3> <a href="/posts/{{$post->id}}">{{ $post->title}}</a></h3>
                <small>Written on {{ $post->created_at }}</small>
            </div>
        @endforeach
        {{$posts->links('pagination::bootstrap-4')}}
    @else
        <div class="jumbotron text-center">
            <h1>Not found post </h1>
        </div>
    @endif

@endsection
