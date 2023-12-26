@extends('layouts.main')

@section('content')
    <!--informacion peliculas y series> -->
    <div class="movie-info border-b border-gray-800 text-white">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{config('services.TMDB.img_rute').$movie['poster_path']}}" alt="Imagen pelicula" class="md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$movie['title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1" > 
                    <svg class="fill-current text-orange-400 w-4" viewBox="0 0 24 24">
                        <path d="m19.448,23.309l-7.467-5.488-7.467,5.488,2.864-8.863L-.082,8.992h9.214L11.981.114l2.849,8.878h9.214l-7.46,5.453,2.864,8.863Zm-7.467-7.971l3.658,2.689-1.403-4.344,3.683-2.691h-4.548l-1.39-4.331v8.677Z">
                    </svg>
                    <span class="ml-1">{{$movie['vote_average']}}</span>
                    <span class="ml-2">&ensp;|&ensp;</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('d M, Y')}}</span>
                    <span class="ml-2">&ensp;|&ensp;</span>
                    <span>
                       {{$movie['genres']}}
                        
                    </span>
                </div>

                <!-- Descrition-->

                <p class="text-gray-300 mt-8"> 
                    {{$movie['overview']}}
                </p>

                <!-- Casting-->
                <div class="mt-8">
                    <h4 class="text-white font-semibold">Equipo Tecnico </h4>
                    <div class="flex mt-4">
                        @foreach ($movie['crew'] as $crew)
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
                <div x-data="{ isOpen: false }">
                    @if (count($movie['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Ver Trailer</span>
                            </button>
                        </div>

                        <template x-if="isOpen">
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isOpen = false"
                                                @keydown.escape.window="isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endif

            </div>
        </div>
    
    </div>

    <!-- Cast -->
    <div class="cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Elenco</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
    
                    @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 10)
                    <div class="mt-8"> 
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{config('services.TMDB.img_rute').$cast['profile_path']}}" alt="Actor Imagen" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div>
                            <a href="{{ route('actors.show', $cast['id']) }}"> {{$cast['name']}}</a>
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

    <div class="movie-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Imagenes</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images'] as $image)
                    <div class="mt-8">
                        <a
                            @click.prevent="
                                isOpen = true
                                image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                            "
                            href="#"
                        >
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen"
            >
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pr-4 pt-2">
                            <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;
                            </button>
                        </div>
                        <div class="modal-body px-8 py-8">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end movie-images -->

    <!-- script js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

@endsection