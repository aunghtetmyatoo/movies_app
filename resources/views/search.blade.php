@extends('layout.app')

@section('title', 'Page Title')

@section('content')
        <div class="container pt-3 pb-3">
            <div class="search row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                @foreach ($searchs as $search)
                    @if ($search['media_type'] == 'movie' && $search['poster_path'])
                        <a href="{{ route('movie_detail', $search['id']) }}">
                            <div class="movie-card">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $search['poster_path'] }}"
                                    class="w-100 rounded" alt="">
                            </div>
                        </a>
                    @elseif ($search['media_type'] == 'tv' && $search['poster_path'])
                        <a href="{{ route('tv_detail', $search['id']) }}">
                            <div class="movie-card">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $search['poster_path'] }}"
                                    class="w-100 rounded" alt="">
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
@endsection
