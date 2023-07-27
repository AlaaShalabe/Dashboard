@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'News'])

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
                                    <div class="col-md-12 d-flex align-items-center">
                                        <h6>{{ $news->title }}</h6>
                                        <div class=" col-md-6 text-end">
                                            <a href="{{ route('news.edit', $news) }}" class="btn btn-success"
                                                style="">
                                                Edit</a>
                                            <form action="{{ route('news.destroy', $news) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this {{ $news->title }} News?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">

                                    <div class="card-body px-4 pt-2">
                                        <p>
                                            <img src="{{ asset('images/news' . $news->image) }}" alt="Placeholder image">
                                        </p>
                                        <p><strong>Title:</strong>{{ $news->getLocalized('title') }}</p>
                                        <p><strong>Content:</strong> {{ $news->topic->getLocalized('name') }}</p>
                                        <p><strong>Topic:</strong> {{ $news->getLocalized('content') }}</p>
                                        <p><strong>Created at:</strong> {{ $news->created_at->format('d - M') }}</p>

                                    </div>
                                </div>
                                <div class="col-md-12 d-flex align-items-center">

                                    <div class=" col-md-10 text-end">
                                        <a href="{{ route('news.index') }}" class="btn btn-info"
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
