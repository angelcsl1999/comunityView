@extends('layouts.main')

@section('content')
    <!--<div>Indice de Peliculas</div>-->
    <div class="container mx-auto px-4 pt-16">
        <div class="peliculas_populares">
            <h2 class="uppercase tracking-wider text-orange-400">Peliculas populares</h2>
            <!-- DIV PELICULAS POPULARES>-->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    
                <!-- Using a component to show the movies-->
                <x-movie-card :movie="$movie" :genres="$genres"/>
                    
                @endforeach
                
            </div>    

            
            <h2 class="uppercase tracking-wider text-orange-400 mt-10 mb-10">En cines</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">    
                @foreach ($nowPlayingMovies as $movie)
                    
                <x-movie-card :movie="$movie" :genres="$genres"/>

                @endforeach


                
                

            </div>
        </div>
    </div>
@endsection