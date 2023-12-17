@extends('layouts.main') 

@section('content')
    <div class="sm:flex flex-col md:justify-center items-center w-full">

            <h1 class="mb-2 text-orange-400 font-bold">{{ $video->title }}</h1>

                <div class=" w-full md:w-6/12">
                    <iframe
                    class="w-full aspect-video"
                    
                        src="{{ asset('storage/' . $video->video_path) }}"
                        allow="accelerometer; autoplay; clipboard-write; 
                        encrypted-media; 
                        gyroscope; 
                        picture-in-picture"
                        allowfullscreen>
                    
                    </iframe>
                </div>

                
                <p class="w-6/12 bg-gray-600 mt-4 mb-6 rounded-md text-white">{{ $video->description }}</p>
                
                <!-- Formulario para agregar un nuevo comentario -->
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                    <textarea name="body" placeholder="Danos tu opinión" 
                    class="flex flex-col w-full max-w-[320px] leading-1.5 p-4
                     border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700 text-white placeholder-white"
                    ></textarea>
                    <button type="submit" class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 mt-2">
                        Comentar</button>
                </form>

                
        </div>
@endsection