@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Articales'])

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="card mb-4">
                    <div class="card-header  ">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6>Articles</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('articles.create') }}" class="btn btn-success me-2" style="">Add
                                    Articles</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2" style="margin-top:3%">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Auth
                                            </th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Title</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Content</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"></h6>
                                                            <img src="{{ asset('images/' . $article->image) }}"
                                                                alt="Placeholder image">
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"></p>
                                                    {{ $article->user->username }}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $article->title }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0"
                                                        style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $article->content }}</p>
                                                </td>

                                                <td class="align-middle text-end">
                                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                        <a href="{{ route('articles.show', $article) }}"
                                                            class="btn btn-info me-2">View</a>
                                                        <a href="{{ route('articles.edit', $article) }}"
                                                            class="btn btn-primary me-2">Edit</a>
                                                        <form action="{{ route('articles.destroy', $article) }}"
                                                            method="POST" class="d-inline">
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
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
