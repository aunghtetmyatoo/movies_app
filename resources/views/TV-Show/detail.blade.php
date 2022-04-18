@extends('layout.app')

@section('title', 'Page Title')

@section('content')
    <div class="container-fluid">
        <div class="col-4 p-5 float-start">
            <img src="https://image.tmdb.org/t/p/w500/{{ $detail['poster_path'] }}" class="w-100 rounded" alt="">
        </div>
        <div class="col-7 pt-5 float-start text-white">
            <h1 class="text-white">{{ $detail['name'] }}</h1>
            <i class="fa-solid fa-star text-warning"></i><span class="m-2">{{ $detail['vote_average'] }}</span>
            @foreach ($detail['genres'] as $genre)
                | {{ $genre['name'] }}
            @endforeach
            <span>| {{ date('M-d-Y', strtotime($detail['first_air_date'])) }}</span>
            <p class="mt-4">{{ $detail['overview'] }}</p>

            <div class="cast mt-5">
                @if ($casts)
                    <h3 class="text-warning fw-bold mb-3">Casts</h3>
                    <div class="swiper mySwiper-cast rounded">
                        <div class="swiper-wrapper">
                            @foreach ($casts as $cast)
                                <div class="swiper-slide">
                                    <div class="col">
                                        <a href="{{ route('star_detail', $cast['id']) }}">
                                            <div class="star-detail-card">
                                                @if ($cast['profile_path'])
                                                    <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $cast['profile_path'] }}"
                                                        class="w-100 rounded" alt="">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ $cast['name'] }}"
                                                        class="w-100 rounded" alt="">
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                @endif
            </div>


            <div class="trailer mt-5 mb-5">
                @if ($trailers)
                    <h3 class="text-warning fw-bold mb-3">Trailers</h3>
                    <div class="swiper mySwiper-trailer rounded">
                        <div class="swiper-wrapper">
                            @foreach ($trailers as $trailer)
                                <div class="swiper-slide">
                                    <div class="ratio ratio-21x9">
                                        <iframe src="https://www.youtube.com/embed/{{ $trailer['key'] }}"
                                            title="YouTube video" allowfullscreen class="rounded"></iframe>
                                    </div>
                                </div>
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
