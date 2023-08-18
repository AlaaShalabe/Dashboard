@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'News'])

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
                                <form role="form" method="POST" action="{{ route('news.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="card-header pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Create News</p>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- Name --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Title in
                                                        English</label>
                                                    <input class="form-control" type="text" name="title_en"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- Name --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Title in
                                                        Arabic</label>
                                                    <input class="form-control" type="text" name="title_ar"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- Image --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Image</label>
                                                    <input class="form-control" type="file" name="image"
                                                        required="">
                                                </div>
                                            </div>
                                            {{-- Tpoic_id --}}
                                            <div class="dropdown">
                                                <label class="label">Topic</label>
                                                <div class="control">
                                                    <div class="select @error('topic_id') is-danger @enderror">
                                                        <select name="topic_id">
                                                            @foreach ($topics as $topic)
                                                                <option value="{{ $topic->id }}"
                                                                    {{ $topic->id == old('topic_id') ? 'selected' : '' }}>
                                                                    {{ $topic->getLocalized('name') }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('topic_id')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Content --}}

                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label>Content in English</label>
                                                    <textarea class="summernote @error('content_en') is-invalid @enderror" id="blog-description" name="content_en"
                                                        cols="30" rows="10" required>{{ old('content_en') }}</textarea>
                                                    @error('content_en')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- Content --}}

                                            <div class="row mb-4">
                                                <div class="col-sm-12">
                                                    <label>Content in Arabic</label>
                                                    <textarea class="summernote @error('content_ar') is-invalid @enderror" id="blog-description" name="content_ar"
                                                        cols="30" rows="10" required>{{ old('content_ar') }}</textarea>
                                                    @error('content_ar')
                                                        <div class="help is-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-11 text-end">
                                        <a href="{{ route('news.index') }}" class="btn btn-info">Back</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth.footer')
        </div>
    @endsection
    @push('js')
        <script>
            $('.summernote').summernote({
                inheritPlaceholder: true,
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        </script>
    @endpush
