@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Articles'])


    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('articles.update', $article) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit article</p>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- Name --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Title</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('title', $article->title) }}" name="title" required="">
                                    </div>
                                </div>
                                {{-- Image --}}
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Image</label>
                                        <input class="form-control" type="file" name="image" required="">
                                    </div>
                                </div> --}}
                                {{-- Content --}}

                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" id="blog-description" name="content"
                                            cols="30" rows="10" required>{{ $article->content }}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('articles.index') }}" class="btn btn-info">Back</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
