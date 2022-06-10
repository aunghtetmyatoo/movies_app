@extends('layout.app')

@section('title', 'Page Title')

@section('content')
    <div class="bg-dark">
        <div class="container pt-3 pb-3">
            <div class="movies row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                @foreach ($movies as $movie)
                    @if ($movie['poster_path'])
                        <div class="col">
                            <a href="/movie/{{ $movie['id'] }}">
                                <div class="movie-card">
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}"
                                        class="w-100 rounded" alt="">
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="page-load-status">
                <p class="infinite-scroll-request spinner text-white">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                </p>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">No more pages to load</p>
            </div>
        </div>
        <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
@endsection
