@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="alert alert-light" role="alert">
            This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
            <strong>
                <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                    here
                </a>
            </strong>
        </div>
        <div class="card mb-4">
            <div class="card-header  ">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6>Roles List</h6>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('roles.create') }}" class="btn btn-success me-2" style="">Add New Role</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">

                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ ++$i }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle justify-content-center">
                                        <p class="text-sm font-weight-bold mb-0">{{ $role->name }}</p>
                                    </td>

                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <a href="{{ route('roles.show', $role->id)  }}" class="btn btn-info me-2">View</a>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary me-2">Edit</a>

                                            @if ($role->name !== 'writer')

                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                                            </form>

                                            @endif

                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection