<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\ViewModels\MoviesIndexViewModel;
class MoviesController extends Controller
{
    

    public function index(){

        $popularMovies = Http::withToken(config('services.TMDB.token'))
                ->get('https://api.themoviedb.org/3/movie/popular')
        ->json()["results"];
        
        
        //take the 10 latest movie
        $popularMovies = array_slice($popularMovies, 0, 10);

        //nowPlayingMovies

        $nowPlayingMovies = Http::withToken(config('services.TMDB.token'))
                ->get('https://api.themoviedb.org/3/movie/now_playing')
        ->json()["results"];
        
        
        //genres
        $genresArray = Http::withToken(config('services.TMDB.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()["genres"];

        $genres=collect($genresArray)->mapWithKeys(function ($genre){
            return[$genre['id'] => $genre['name']];
        })->all();


        // return view('indexMovies',
        //                     ['popularMovies' => $popularMovies,
        //                     'nowPlayingMovies' => $nowPlayingMovies,    
        //                     'genres'=> $genres]);


        //Create the viewModel
        $moviesIndexViewModel = new MoviesIndexViewModel($popularMovies,$nowPlayingMovies,$genres);

        return view('indexMovies',$moviesIndexViewModel);


    }



    public function show($id){

        $movieData = Http::withToken(config('services.TMDB.token'))
                ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
        ->json();

        return view('showMovie',["movieData"=>$movieData,

        ]);
    }
}
