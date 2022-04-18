@extends('layout.app')

@section('title', 'Page Title')

@section('content')
    <div class="bg-dark">
        <div class="container pt-3 pb-3">
            <div class="stars row row-cols-2 row-cols-lg-5 g-4 g-lg-3">
                @foreach ($stars as $star)
                    <div class="col">
                        <a href="{{ route('star_detail', $star['id']) }}">
                            <div class="star-card">
                                @if ($star['profile_path'])
                                    <img src="https://image.tmdb.org/t/p/w235_and_h235_face/{{ $star['profile_path'] }}"
                                        class="w-100 rounded" alt="">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ $star['name'] }}" class="w-100 rounded"
                                        alt="">
                                @endif
                            </div>
                        </a>
                    </div>
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
