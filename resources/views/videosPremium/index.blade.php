
@extends('layouts.main') 

@section('content')
    <div class="container mx-auto px-4 pt-16 text-white">
        <div class="videos_premium">
            <h2 class="uppercase tracking-wider text-orange-400 mb-4">Nuestro mejor contenido para ti</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @if ($videos->isEmpty())
                    <p>No hay videos disponibles.</p>
                @else
                    @foreach ($videos as $video)
                    <div class="video mt-2">
                        <a href="{{route('videos.showDetails',$video->_id) }}">
                        <img src="{{ asset('storage/' . $video->image_path) }}" 
                                    alt="{{ $video->title }}" 
                                    width="200">
                        </a>
                        <h2>{{ $video->title }}</h2>
                        
                        
                    </div> 
                    
                @endforeach
                
                @endif
            </div>    
    </div> 
@endsection