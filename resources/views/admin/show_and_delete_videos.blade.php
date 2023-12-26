@extends('layouts.main')

@section('content')
    

    @if ($videos->isEmpty())
        <p class="text-white pl-6">No hay videos disponibles.</p>
    @else
    <div class="container py-12 md:ml-4 md:mr-4  md:justify-center">
        <div class="row justify-content-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h1 class="text-orange-500 font-bold ">Lista de Videos</h1>
            <table class="table-auto bg-white border-separate  ">
                <thead>
                    <tr>
                        <th class="pl-4">Título</th>
                        <th class="pl-4 hidden md:table-cell">Descripción</th>
                        <th class="pl-4 hidden sm:table-cell">ID</th>
                        <th class="pl-4">Comentarios</th>
                        <th class="pl-4 pr-4">Acciones</th> <!-- Nueva columna para botones de borrar -->
                    </tr >
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr class="mb-8">
                            <td class="pl-4">{{ $video->title }}</td>
                            <td class="pl-4 hidden md:table-cell">{{ $video->description }}</td>
                            <td class="pl-4 hidden sm:table-cell">{{ $video->_id }}</td>
                            <td class="pl-4 pr-4">                        
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" onclick="window.location='{{ url("/videosPremium/$video->id/download-comments") }}'">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>

                                </button>

                            </td>
                            <td class="pl-4 pr-4">
                                <form action="{{ route('videos.delete', $video->_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                     onclick="return confirm('¿Estás seguro de querer borrar este video?')">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection