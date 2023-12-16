@extends('layouts.main')

@section('content')
    

    @if ($videos->isEmpty())
        <p class="text-white pl-6">No hay videos disponibles.</p>
    @else
    <div class="container py-12 md:ml-4 md:mr-4  md:justify-center">
        <div class="row justify-content-center max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h1 class="text-orange-500 font-bold">Lista de Videos</h1>
            <table class="table-auto bg-white ">
                <thead>
                    <tr>
                        <th class="pl-4">Título</th>
                        <th class="pl-4 hidden md:block">Descripción</th>
                        <th class="pl-4">ID</th>
                        <th class="pl-4 pr-4">Acciones</th> <!-- Nueva columna para botones de borrar -->
                    </tr >
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td class="pl-4">{{ $video->title }}</td>
                            <td class="pl-4 hidden md:block">{{ $video->description }}</td>
                            <td class="pl-4">{{ $video->_id }}</td>
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