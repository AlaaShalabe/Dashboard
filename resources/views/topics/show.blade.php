@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Topics'])

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
                                        <form action="{{ route('topics.destroy', $topic) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('topics.edit', $topic) }}" class="btn btn-success"
                                                style="">
                                                Edit</a>
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this {{ $topic->getLocalized('name') }} News?')">Delete</button>
                                        </form>
                                    </div>

                                </div>




                                <div class="card">

                                    <div class="card-body px-4 pt-2">


                                        <p><strong><B>Details of {{ $topic->name_en }} topic: </B></strong></p>


                                        <p><strong>Topic en : </strong> {{ $topic->name_en }}</p>
                                        <p><strong>Topic ar : </strong> {{ $topic->name_ar }}</p>

                                        <p><strong>Created at : </strong> {{ $topic->created_at->format('d M Y - h:m') }}
                                        </p>

                                        <p><strong><u> News of {{ $topic->name_en }} topic: </u></strong></p>
                                    </div>

                                    <div class="row">
                                        @foreach ($topic->news as $new)
                                            <div class="col-md-4">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div class="w-50 mx-auto">
                                                            <img src="{{ asset('images/news/' . $new->image) }}"
                                                                alt="" width="400" height="400" class="img-fluid">
                                                        </div>
                                                        <div class="pull-left">
                                                            <span>―</span>
                                                            <strong>title en: </strong> {{ $new->title_en }}
                                                        </div>
                                                        <div class="pull-left">
                                                            <span>―</span>
                                                            <strong>title ar: </strong> {{ $new->title_ar }}
                                                        </div>
                                                        <a href="{{ route('news.show', $new) }}"
                                                            class="text-success icon-move-right pull-right">Read More
                                                            <i class="fas fa-arrow-right text-sm ms-1"
                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
