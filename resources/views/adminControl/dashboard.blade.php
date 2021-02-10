
@extends('layouts.adminapp')


@section('content')

    <h1>Dashboard</h1>
    <hr>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Blog</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $posts }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            User Account </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $users }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Admin Account </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $admins }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
