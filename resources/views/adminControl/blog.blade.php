
@extends('layouts.adminapp')


@section('content')


    <h1>Blog Control</h1>
    @if ( count($posts) < 1)
        <div class="jumbotron text-center">
            <h1>Not found post </h1>
        </div>

    @else
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Create By</th>
                <th scope="col">Role</th>
                <th scope="col">Create Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
                    <tr>
                        {{-- Order --}}
                        <th scope="row">
                            <?php
                                while ($Or_st <= $Or_su) {

                                    echo $Or_st;

                                    if ($Or_st <= $Or_su) {
                                        $Or_st++;
                                        break;
                                    }
                                }
                            ?>
                        </th>
                        {{-- Tile --}}

                        <td ><a href="posts/{{$post->id}}">{{$post->title}}</a></td>

                        {{-- Create By --}}
                        <td>
                            <?php
                                $id = $post->post_id;
                                if ($id[0] == 'A') {
                                    $id = substr($id, 1);
                                    $idn = $admins->find($id)->name;

                                    echo $idn;
                                }else {
                                    $id = substr($id, 1);
                                    $idn = $users->find($id)->name;
                                    echo $idn;
                                }
                            ?>
                        </td>

                        {{-- Role --}}
                        <td>
                            <?php
                                $id = $post->post_id;
                                if ($id[0] == 'A') {

                                    echo 'Admin';
                                }else {
                                    echo 'User';
                                }
                            ?>
                        </td>
                        {{-- Create Date --}}
                        <td>{{$post->created_at->toFormattedDateString()}}</td>

                        {{-- Action --}}
                        <td>
                            <form action="{{url('posts',[$post->id])}}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                            </div>
                        </td>
                    </tr>

                @endforeach

        </tbody>
    </table>

    @endif

@endsection
