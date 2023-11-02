<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\ViewModels\ActorsIndexViewModel;
use App\ViewModels\ActorShowViewModel;

class ActorsController extends Controller
{
    public function index($page = 1){
        abort_if($page > 500, 204);

        $popularActors = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/person/popular?page='.$page)
            ->json()['results'];
        dump($popularActors);
        $actorsIndexViewModel = new ActorsIndexViewModel($popularActors, $page);
        return view('actors.indexActors', $actorsIndexViewModel);
    }

    public function show($id)
    {
        $actor = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id)
            ->json();

        $social = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/external_ids')
            ->json();

        $credits = Http::withToken(config('services.TMDB.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
            ->json();

        
        $viewModel = new ActorShowViewModel($actor, $social, $credits);
        
        return view('actors.showActors', $viewModel);
    }
}
