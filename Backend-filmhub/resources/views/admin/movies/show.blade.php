@extends('admin.layouts.master')

@section('title')
    Detail Movie
@endsection

@section('style-libs')
    <!-- Plugins css -->
    <link href="{{ asset('theme/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
    {{-- multiple choise --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
@endsection

@section('script-libs')
    <!-- ckeditor -->
    <script src="{{ asset('theme/admin/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <!-- dropzone js -->
    <script src="{{ asset('theme/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('theme/admin/js/create-product.init.js') }}"></script>

    {{-- multiple choise --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection
<style>
    .bootstrap-select .dropdown-toggle {
        height: 50px;
        border: 2px solid black;
        border-radius: 10px;
        background-color: #f8f9fa;
        color: #495057;
    }

    .bootstrap-select .dropdown-menu {
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .bootstrap-select .dropdown-menu li a {
        color: #495057;
    }

    .bootstrap-select .dropdown-menu li a:hover {
        background-color: #2855a7;
        color: white;
    }
</style>
@section('content')
    <form action="{{ route('admin.movies.update', $movie->movie_id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="mb-3 col-6">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" value="{{ $movie->title }}" disabled id="title" name="title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" value="{{ $movie->description }}" disabled id="description"
                    name="description">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="duration" class="form-label">Duration:</label>
                <input type="number" class="form-control" value="{{ $movie->duration }}" disabled id="duration" name="duration">
                @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="release_date" class="form-label">Release date:</label>
                <input type="date" class="form-control" value="{{ $movie->release_date }}" disabled id="release_date"
                    name="release_date">
                @error('release_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 col-6">
                <label for="genres" class="form-label">Genre:</label>
                <select id="genres" name="genres[]"  disabled class="selectpicker form-control" multiple data-live-search="true">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->genre_id }}"
                            {{ $movie->genres && in_array($genre->genre_id, $movie->genres->pluck('genre_id')->toArray()) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="poster_url" class="form-label">Poster:</label>
                <img src="{{ Storage::url($movie->poster_url) }}" style="width: 150px; height: 150px;" alt="">
                @error('poster_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="status" class="form-label">Status:</label>
                <select name="status" class="form-control" disabled  id="status">
                    <option value="{{ $movie->status }}" selected>{{ $movie->status }}</option>
                    <option value="Sắp ra mắt">Sắp ra mắt</option>
                    <option value="Đang chiếu">Đang chiếu</option>
                    <option value="Ngừng chiếu">Ngừng chiếu</option>
                </select>
                @error('director')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="director" class="form-label">Director:</label>
                <input type="text" class="form-control" value="{{ $movie->director }}" disabled id="director"  name="director">
                @error('director')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="performer" class="form-label">Performer:</label>
                <input type="text" class="form-control" value="{{ $movie->performer }}" disabled id="performer"  name="performer">
                @error('performer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="trailer" class="form-label">Trailer:</label>
                <input type="text" class="form-control" value="{{ $movie->trailer }}" disabled id="trailer" disabled name="trailer">
                @error('trailer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>
