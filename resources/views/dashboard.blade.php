@extends('layouts.main')
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-100">
                <p>Logueado correctamente</p>   
            </div>
        </div>
        @role('basic')
        I am a writer!
        @else
        I am not a writer...
        @endrole
    </div>  
    
@endsection


