<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieInfoController extends Controller
{
    public function index()
    {
        $upcomingMovies = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=1')->json('results');

        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=1')->json('results');

        $popularTvs = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=1')->json('results');

        return view('index', compact(['upcomingMovies', 'popularMovies', 'popularTvs']));
    }
    public function movies($page = 1)
    {
        $movies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=' . $page)->json('results');

        return view('Movie.movies', compact(['movies', 'page']));
    }
    public function movies_page($page)
    {
        $movies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=' . $page)->json('results');

        return view('Movie.movies', compact('movies'));
    }
    public function movie_detail($id)
    {
        $detail = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json();
        // dd($detail);

        if (Http::get('https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('cast')) {
            $casts = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('cast');
        } elseif (Http::get('https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('crew')) {
            $casts = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('crew');
        } else {
            $casts = '';
        }

        $trailers = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('results');

        return view('Movie.detail', compact(['detail', 'casts', 'trailers']));
    }

    public function tv_shows($page = 1)
    {
        $tvShows = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=' . $page)->json('results');

        return view('TV-Show.tv_shows', compact('tvShows'));

    }
    public function tv_shows_page($page)
    {
        $tvShows = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=' . $page)->json('results');

        return view('TV-Show.tv_shows', compact('tvShows'));

    }

    public function tv_detail($id)
    {
        $detail = Http::get('https://api.themoviedb.org/3/tv/' . $id . '?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json();

        if (Http::get('https://api.themoviedb.org/3/tv/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('cast')) {
            $casts = Http::get('https://api.themoviedb.org/3/tv/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('cast');
        } elseif (Http::get('https://api.themoviedb.org/3/tv/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('crew')) {
            $casts = Http::get('https://api.themoviedb.org/3/tv/' . $id . '/credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('crew');
        } else {
            $casts = '';
        }

        $trailers = Http::get('https://api.themoviedb.org/3/tv/' . $id . '/videos?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('results');

        return view('TV-Show.detail', compact(['detail', 'casts', 'trailers']));
    }

    public function stars($page = 1)
    {
        $stars = Http::get('https://api.themoviedb.org/3/person/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=' . $page)->json('results');

        return view('Star.stars', compact(['stars', 'page']));
    }
    public function stars_page($page)
    {
        // dd($page);
        $stars = Http::get('https://api.themoviedb.org/3/person/popular?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&page=' . $page)->json('results');

        return view('Star.stars', compact(['stars', 'page']));
    }
    public function star_detail($id)
    {
        $detail = Http::get('https://api.themoviedb.org/3/person/' . $id . '?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json();

        $known_fors = Http::get('https://api.themoviedb.org/3/person/' . $id . '/combined_credits?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US')->json('cast');

        $age = Carbon::parse($detail['birthday'])->age;

        return view('Star.detail', compact(['detail', 'known_fors', 'age']));
    }
    public function search(Request $request)
    {
        $search = $request->search;

        $searchs = Http::get('https://api.themoviedb.org/3/search/multi?api_key=fd5079575b161f2a4e700c8b8548161e&language=en-US&query=' . $search . '&page=1&include_adult=false')->json('results');

        return view('search', compact('searchs'));
    }
}