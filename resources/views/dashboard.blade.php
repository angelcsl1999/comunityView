@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <p class="text-white">Logueado correctamente</p>   
            </div>
            <button>
                <button type="button" class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="window.location='{{ url("/") }}'">Inicio</button>
            </button>
        </div>
    </div>  
@endsection


