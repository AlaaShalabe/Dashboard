@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])


<div id="alert">
    @include('components.alert')
</div>


<div class="row justify-content-center mt-4">
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header  ">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center">
                        <h6>{{$role->name}}</h6>
                        <div class="col-md-10 text-end">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success" style=""> Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                            </form>
                        </div>

                    </div>

                </div>


                <div class="card">

                    <div class="card-body px-4 pt-2">
                        <p><strong>Role Name:</strong> {{ $role->name }}</p>
                        <p><strong>Permissions Name:</strong>

                            <ul>

                                @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                <li>{{ $v->name }}</li>
                                @endforeach
                                @endif
                            </ul>
                            <a href="{{ route('roles.index') }}" class="btn btn-info" style="margin-left: 150px">Back</a>
                    </div>
                </div>

            </div>
        </div>



    </div>
    <div style="margin-top: 10%">
        @include('layouts.footers.auth.footer')
    </div>

    @endsection
