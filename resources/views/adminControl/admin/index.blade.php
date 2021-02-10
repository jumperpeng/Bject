
@extends('layouts.adminapp')


@section('content')


    <div class="row">
        <h1>Account Control Admin</h1>
        <div class="text-right col-md-7 ">
            <a href="{{ route('admin.accountadmin.create')}}" class="btn btn-success mt-3">Create</a>
        </div>
    </div>




    @if ( count($admins) < 1)
        <div class="jumbotron text-center">
            <h1>Not found post </h1>
        </div>

    @else

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">username</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($admins as $admin)
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
                        {{-- Username --}}

                        <td ><a href="accountadmin/{{ $admin->id }}">{{ $admin->username }}</a></td>

                        {{-- Name --}}
                        <td>{{ $admin->name }}</td>

                        {{-- Email --}}
                        <td>{{ $admin->email }}</td>

                        {{-- Action --}}
                        <td>
                            <form action="{{url('accountadmin',[$admin->id])}}" method="post">
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
