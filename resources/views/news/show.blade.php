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

                                    <h6>{{ $news->title }}</h6>
                                    <div class=" col-md-12 text-end">
                                        <a href="{{ route('news.edit', $news) }}" class="btn btn-success" style="">
                                            Edit</a>
                                        <form action="{{ route('news.destroy', $news) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this {{ $news->title }} News?')">Delete</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="card">

                                    <div class="card-body px-4 pt-2">
                                        <p style="text-align-last: center">
                                            <img src="{{ asset('images/news/' . $news->image) }}" alt="Placeholder image">
                                        </p>

                                        <p><strong><B>Details of {{ $news->title_en }}: </B></strong></p>

                                        <p><strong>Title en : </strong>{{ $news->title_en }}</p>
                                        <p><strong>Title ar : </strong>{{ $news->title_ar }}</p>
                                        <p><strong>Topic en : </strong> {{ $news->topic->name_en }}</p>
                                        <p><strong>Topic ar : </strong> {{ $news->topic->name_ar }}</p>
                                        <p><strong>Content en : </strong> {{ $news->title_en }}</p>
                                        <p><strong>Content ar : </strong> {{ $news->title_ar }}</p>
                                        <p><strong>Created at : </strong> {{ $news->created_at->format('d M Y - h:m') }}
                                        </p>

                                    </div>

                                    <div class=" col-md-11 text-end">
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
