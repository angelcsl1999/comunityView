@extends('layouts.main')

@section('content')
    <!--informacion peliculas y series> -->
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{config('services.TMDB.img_rute').$movieData['poster_path']}}" alt="Imagen pelicula" class="md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$movieData['original_title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1" > 
                    <svg class="fill-current text-orange-400 w-4" viewBox="0 0 24 24">
                        <path d="m19.448,23.309l-7.467-5.488-7.467,5.488,2.864-8.863L-.082,8.992h9.214L11.981.114l2.849,8.878h9.214l-7.46,5.453,2.864,8.863Zm-7.467-7.971l3.658,2.689-1.403-4.344,3.683-2.691h-4.548l-1.39-4.331v8.677Z">
                    </svg>
                    <span class="ml-1">{{$movieData['vote_average']*10}}% </span>
                    <span class="ml-2">&ensp;|&ensp;</span>
                    <span>{{ \Carbon\Carbon::parse($movieData['release_date'])->format('d M, Y')}}</span>
                    <span class="ml-2">&ensp;|&ensp;</span>
                    <span>
                        @foreach ($movieData['genres'] as $genre)
                        {{$genre["name"]}} @if(!$loop->last) , @endif
                        @endforeach
                    </span>
                </div>

                <!-- Descrition-->

                <p class="text-gray-300 mt-8"> 
                    {{$movieData['overview']}}
                </p>

                <!-- Casting-->
                <div class="mt-8">
                    <h4 class="text-white font-semibold">Equipo Tecnico </h4>
                    <div class="flex mt-4">
                        @foreach ($movieData['credits']['crew'] as $crew)
                        @if ($loop->index < 3)
                        <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                        @else 
                            @break
                        @endif
                        
                        @endforeach
                    </div>
                </div>

                <!-- Trailer -->
                @if(count($movieData['videos']['results']) > 0)
                <div class="mt-12">
                    <a   class=" inline-flex items-center bg-orange-400 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-500 transition ease-in-out duration-150" href="https://youtube.com/watch?v={{$movieData['videos']['results'][0]['key']}}" target="_blank">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0,12A12,12,0,1,0,12,0,12.013,12.013,0,0,0,0,12ZM11.6,6.269l5.154,5.087a.9.9,0,0,1,0,1.288L11.6,17.731a.924.924,0,0,1-1.575-.644V6.913A.924.924,0,0,1,11.6,6.269Z"> 
                        </svg>
                        <span class="ml-2">Ver Trailer/Pelicula </span>
                    </a>
                </div>
                @endif


            </div>
        </div>
    
    </div>

    <!-- Cast -->
    <div class="cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Elenco</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
    
                    @foreach ($movieData['credits']['cast'] as $cast)
                    @if ($loop->index < 10)
                    <div class="mt-8"> 
                        
                            <img src="{{config('services.TMDB.img_rute').$cast['profile_path']}}" alt="Actor Imagen" class="hover:opacity-75 transition ease-in-out duration-150">
                        
                        <div>
                            <a href="#"> {{$cast['name']}}</a>
                            <div class="text-sm text-grey-400">
                                {{$cast['character']}}
                            </div>
                        </div>    
                    </div>
                    @else 
                        @break
                    @endif
                    @endforeach
            </div>        
        </div>
        
    </div>
    
    <!-- Images -->

    <div class="movie-images">
         <div class="container mx-auto px-4 py-16"> 
            <h2 class="text-4xl font-semibold">Imagenes</h2>
         
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movieData['images']['backdrops'] as $img)
                @if($loop->index < 9)
                    <div class="mt-8">
                        <a href="#"> 
                            <img src="{{config('services.TMDB.img_rute').$img['file_path']}}" alt="img" class="hover:opacity-75 transition ease-in-out duration-150 ">
                        </a>
                    </div>
                @else 
                     @break
                @endif
                @endforeach
            </div>
        </div>
    </div>

@endsection