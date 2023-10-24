<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;


//View model of the index web for movies

class MoviesIndexViewModel extends ViewModel
{


    public $popularMovies;
    public $nowPlayingMovies;
    public $genres;

    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }


    public function popularMovies(){
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies(){
        return $this->formatMovies($this->nowPlayingMovies);
    }

    public function genres(){
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }


    //return movies formated
    private function formatMovies($movies){




        return collect($movies)->map(function($movie){
            
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value){

                return[$value => $this->genres()->get($value)];
            })->implode(", ");

            return collect($movie)->merge([
                //this change de path value of each movie image for the full route , so we can acces to TMDB directly
                'poster_path' => ('https://image.tmdb.org/t/p/w500/'.$movie['poster_path']),
                'vote_average' => ($movie['vote_average'] * 10) .'%' , 
                'release_date' => Carbon::parse($movie['release_date'])->format('d M, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
    }
}
