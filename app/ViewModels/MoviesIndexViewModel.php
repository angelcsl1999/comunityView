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
        $this->popularMovies=$popularMovies;
        $this->nowPlayingMovies=$nowPlayingMovies;
        $this->genres=$genres;
    }


    public function popularMovies(){

        //this change de path value of each movie image for the full route , so we can acces to TMDB directly
        return collect($this->popularMovies)->map(function($movie){
            return collect($movie)->merge([
                'poster_path' => ('https://image.tmdb.org/t/p/w500/'.$movie['poster_path']),
                'vote_average' => ($movie['vote_average'] * 10) .'%' , 
                'release_date' => Carbon::parse($movie['release_date'])->format('d M, Y'),
            ]);
        });
    }

    public function nowPlayingMovies(){
        return $this->nowPlayingMovies;
    }

    public function genres(){
        return $this->genres;
    }
}
