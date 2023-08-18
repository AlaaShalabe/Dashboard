@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Users'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div id="alert">
                    @include('components.alert')
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-lg-10">
                        <div class="card mb-4">
                            <div class="card-header  ">
                                <div class="row">
                                    <div class=" col-md-12 text-end">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success"
                                                style=""> Edit</a>
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body px-4 pt-2">
                                        <p><strong><u> Details of {{ $user->username }} user: </u></strong></p>
                                        <p><strong>User Name:</strong> {{ $user->username }}</p>
                                        <p><strong>First Name:</strong> {{ $user->firstname }}</p>
                                        <p><strong>Last Name:</strong> {{ $user->lastname }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>

                                        <p><strong>Address:</strong> {{ $user->address ?? '-' }}</p>
                                        <p><strong>Role Name:</strong> {!! Form::select('roles_name[]', $roles, [], ['class' => 'form-control']) !!} </p>
                                        <p><strong>Created at:</strong> {{ $user->created_at->format('d M Y - h:m') }}</p>
                                    </div>

                                    <div class=" col-md-11 text-end">
                                        <a href="{{ route('users.index') }}" class="btn btn-info"
                                            style="margin-left: 150px">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
