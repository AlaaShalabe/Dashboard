@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'News Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="alert alert-light" role="alert">
                <strong>
                    @if (Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                </strong>
            </div>
            <div class="card mb-4">
                <div class="card-header  ">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6>News</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('news.create') }}" class="btn btn-success me-2" style="">Add News</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Topic</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Content</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $new)
                                        <tr>


                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0">{{ $new->title }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0"
                                                    style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $new->topic->name }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-sm font-weight-bold mb-0"
                                                    style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ $new->content }}</p>
                                            </td>

                                            <td class="align-middle text-end">
                                                <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                    <a href="{{ route('news.show', $new) }}"
                                                        class="btn btn-info me-2">View</a>
                                                    <a href="{{ route('news.edit', $new) }}"
                                                        class="btn btn-primary me-2">Edit</a>
                                                    <form action="{{ route('news.destroy', $new) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this News?')">Delete</button>
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
    @endsection
