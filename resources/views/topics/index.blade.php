@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Topics'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="row mt-4 mx-4">
                    <div class="col-12">

                        <div class="card mb-4">
                            <div class="card-header  ">
                                <div class="row">
                                    <div class="container">
                                        <div class="row justify-content-md-center">
                                            <div class="col-10">
                                                <span>
                                                    @if (session($key ?? 'status'))
                                                        <div class="alert alert-secondary" role="alert">
                                                            <strong>{{ session($key ?? 'status') }}</strong>
                                                        </div>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6>Topics</h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="{{ route('topics.create') }}" class="btn btn-success me-2"
                                            style="">Add New
                                            Topic</a>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Name
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($topics as $topic)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-3 py-1">

                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">
                                                                        {{ $topic->getLocalized('name') }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="align-middle text-end">
                                                            <div
                                                                class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                                <a href="{{ route('topics.show', $topic) }}"
                                                                    class="btn btn-info me-2">View</a>
                                                                <a href="{{ route('topics.edit', $topic) }}"
                                                                    class="btn btn-primary me-2">Edit</a>
                                                                <form action="{{ route('topics.destroy', $topic) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"
                                                                        onclick="return confirm('Are you sure you want to delete this Topic?')">Delete</button>
                                                                </form>
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
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
