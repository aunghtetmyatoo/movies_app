@extends('layout.app')

@section('title', 'Page Title')

@section('content')
    <div class="container-fluid">
        <div class="col-4 p-5 float-start">
            <img src="https://image.tmdb.org/t/p/w500/{{ $detail['profile_path'] }}" class="w-100 rounded" alt="">
        </div>
        <div class="col-7 pt-5 pb-5 float-start text-white">
            <h1 class="text-white">{{ $detail['name'] }}</h1>
            {{-- <i class="fa-solid fa-star text-warning"></i><span class="m-2">{{ $detail['vote_average'] }}</span> --}}
            @if ($detail['birthday'])
                <span>Born : {{ $detail['birthday'] }}</span>
                @if ($detail['deathday'])
                    <br><span>Died : {{ $detail['deathday'] }}</span>
                @else
                    <span>(age {{ $age }} years)</span>
                @endif
            @endif
            <p class="mt-4">{{ $detail['biography'] }}</p>
            <div class="cast mt-5">
                @if ($known_fors)
                    <h3 class="text-warning fw-bold mb-3">Known For</h3>
                    <div class="swiper mySwiper-cast rounded">
                        <div class="swiper-wrapper">
                            @foreach ($known_fors as $known_for)
                                @if ($known_for['poster_path'])
                                    <div class="swiper-slide">
                                        <div class="col">
                                            @if ($known_for['media_type'] == 'movie')
                                                <a href="{{ route('movie_detail', $known_for['id']) }}">
                                                    <div class="star-detail-card">
                                                        @if ($known_for['poster_path'])
                                                            <img src="https://image.tmdb.org/t/p/w500/{{ $known_for['poster_path'] }}"
                                                                class="w-100 rounded" alt="">
                                                        @endif
                                                    </div>
                                                </a>
                                            @elseif ($known_for['media_type'] == 'tv')
                                                <a href="{{ route('tv_detail', $known_for['id']) }}">
                                                    <div class="star-detail-card">
                                                        @if ($known_for['poster_path'])
                                                            <img src="https://image.tmdb.org/t/p/w500/{{ $known_for['poster_path'] }}"
                                                                class="w-100 rounded" alt="">
                                                        @endif
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
