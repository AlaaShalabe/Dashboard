@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])


<div id="alert">
    @include('components.alert')
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form role="form" method="POST" action={{ route('roles.update', $role->id) }}>
                    @csrf
                    @method('PUT')
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Roles</p>

                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Role Information</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Role Name:</strong>

                                    {!! Form::text('name', $role->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Permissions List</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <ul id="treeview1">
                                    <li><a href="#">Permissions: </a>
                                        <ul>
                                            <li>
                                                @foreach($permission as $value)
                                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                    {{ $value->name }}</label>
                                                <br />
                                                @endforeach
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>


                    </div>
                    <div class="text-center">
                        <a href="{{ route('roles.index') }}" class="btn btn-info">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @include('layouts.footers.auth.footer')
</div>
@endsection
