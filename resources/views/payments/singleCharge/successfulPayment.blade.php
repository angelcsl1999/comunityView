@extends('layouts.main')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text-white">
        <p>Se ha realizado el pago correctamente</p>
        <button>
            <button type="button" class="bg-orange-500 text-white active:bg-orange-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" onclick="window.location='{{ url("/") }}'">Inicio</button>
        </button>
    </div>
    
</div>
@endsection