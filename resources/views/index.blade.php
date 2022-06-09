@extends('layout.app')

@section('title', 'Page Title')

@section('content')
    <div class="bg-img">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide shadow-lg p-3 bg-dark rounded" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="#popular">
                            <img src="https://image.tmdb.org/t/p/original/iQFcwSGbZXMkeyKrxbPnwnRo5fl.jpg"
                                class="d-block w-100" alt="" height="">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#tv-show">
                            <img src="https://image.tmdb.org/t/p/original/wiE9doxiLwq3WCGamDIOb2PqBqc.jpg"
                                class="d-block w-100" alt="">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#upcoming">
                            <img src="https://image.tmdb.org/t/p/original/mZ3dl55cY8xtbzX06MOh31pV84Y.jpg"
                                class="d-block w-100" alt="">
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="main bg-dark">
        <div class="container pb-5">
            <div class="popular" id="popular">
                <h3 class="text-warning pt-5 fw-bold mb-3">Popular Movies</h3>
                <div class="swiper mySwiper rounded">
                    <div class="swiper-wrapper">
                        @foreach ($popularMovies as $popularMovie)
                            @if ($popularMovie['poster_path'])
                                <div class="swiper-slide">
                                    <div class="col">
                                        <a href="{{ route('movie_detail', $popularMovie['id']) }}">
                                            <div class="img-card">
                                                <img src="https://image.tmdb.org/t/p/w500/{{ $popularMovie['poster_path'] }}"
                                                    class="w-100 rounded" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="tv-show" id="tv-show">
                <h3 class="text-warning pt-5 fw-bold mb-3">Popular TV Shows</h3>
                <div class="swiper mySwiper rounded">
                    <div class="swiper-wrapper">
                        @foreach ($popularTvs as $popularTv)
                            @if ($popularTv['poster_path'])
                                <div class="swiper-slide">
                                    <div class="col">
                                        <a href="{{ route('tv_detail', $popularTv['id']) }}">
                                            <div class="img-card">
                                                <img src="https://image.tmdb.org/t/p/w500/{{ $popularTv['poster_path'] }}"
                                                    class="w-100 rounded" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="upcoming" id="upcoming">
                <h3 class="text-warning pt-5 fw-bold mb-3">Upcoming Movies</h3>
                <div class="swiper mySwiper rounded">
                    <div class="swiper-wrapper">
                        @foreach ($upcomingMovies as $upcomingMovie)
                            @if ($upcomingMovie['poster_path'])
                                <div class="swiper-slide">
                                    <div class="col">
                                        <a href="{{ route('movie_detail', $upcomingMovie['id']) }}">
                                            <div class="img-card">
                                                <img src="https://image.tmdb.org/t/p/w500/{{ $upcomingMovie['poster_path'] }}"
                                                    class="w-100 rounded" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
