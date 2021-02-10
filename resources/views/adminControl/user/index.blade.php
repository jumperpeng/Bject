
@extends('layouts.adminapp')


@section('content')

    <div class="row">
        <h1>Account Control User</h1>
        <div class="text-right col-md-7 ">
            <a href="{{ route('admin.accountuser.create')}}" class="btn btn-success mt-3">Create</a>
        </div>
    </div>


    @if ( count($users) < 1)
        <div class="jumbotron text-center">
            <h1>Not found post </h1>
        </div>

    @else

    <table class="table table-fixed mt-3">
        <thead>
            <tr>
                <th scope="col" >#</th>
                <th scope="col" >username</th>
                <th scope="col" >name</th>
                <th scope="col" >email</th>
                <th scope="col" >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                    <tr>
                        {{-- Order --}}
                        <th scope="row" >
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

                        <td ><a href="accountuser/{{ $user->id }}">{{ $user->username }}</a></td>

                        {{-- Name --}}
                        <td >{{ $user->name }}</td>

                        {{-- Email --}}
                        <td >{{ $user->email }}</td>

                        {{-- Action --}}
                        <td >
                            <form action="{{url('accountuser',[$user->id])}}" method="post">
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
