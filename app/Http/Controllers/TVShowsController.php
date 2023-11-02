<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TVShowsIndexViewModel;
use App\ViewModels\TVShowViewModel;
use Illuminate\Support\Facades\Http;

class TVShowsController extends Controller
{
    public function index()
    {
        $popularTv = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'];

        
        $topRatedTv = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated')
            ->json()['results'];

        $genres = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];

        $viewModel = new TVShowsIndexViewModel(
            $popularTv,
            $topRatedTv,
            $genres,
        );

        return view('tv.indexTVShows', $viewModel);
    }

    public function show($id)
    {
        $tvshow = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $viewModel = new TVShowViewModel($tvshow);

        return view('tv.showTVShow', $viewModel);
    }

    
}
