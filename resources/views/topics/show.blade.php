@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])


    <div id="alert">
        @include('components.alert')
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-lg-11">
            <div class="card mb-4">
                <div class="card-header  ">
                    <div class="col-md-4">
                        <div class="card card-plain card-blog mt-4">
                            <div class="card-image border-radius-lg position-relative">
                                <div class="row">
                                    <div class="col-md-12 d-flex align-items-center">
                                        <h6>{{ $topic->name }}</h6>
                                        <div class=" col-md-6 text-end">
                                            <a href="{{ route('topics.edit', $topic) }}" class="btn btn-success"
                                                style="">
                                                Edit</a>
                                            <form action="{{ route('topics.destroy', $topic) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this {{ $topic->name }} News?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        @foreach ($topic->news as $new)
                            <div class="col-md-4">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="w-50 mx-auto">
                                            <img src="./assets/img/kit/pro/anastasia.jpg" alt="" class="img-fluid">
                                        </div>
                                        <p class="card-description mb-5 mt-3">
                                            {{ $new->content }}
                                        </p>
                                        <div class="pull-left">
                                            <span>―</span>
                                            {{ $new->title }}
                                        </div>
                                        <a href="{{ route('news.show', $new) }}"
                                            class="text-success icon-move-right pull-right">Read More
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection
