@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Topics'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form role="form" method="POST" action="{{ route('topics.update', $topic) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">New Topic</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Name</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('name', $topic->name) }}" name="name"
                                                        required="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <a href="{{ route('topics.index') }}" class="btn btn-info">Back</a>
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
