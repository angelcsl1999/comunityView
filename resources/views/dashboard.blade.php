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
   
        <img src=" {{storage_path('app\public\images\ComunityView-logos_white.png') }}" class="w-76 text-white" alt="FALLA">
        <img src=" {{storage_path('app\public\images\file_example_JPG_100kB.jpg') }}" class="w-76 text-white" alt="FALLA5">
        <br>


        <img src="{{ base_path().'\public\storage\images\ComunityView-logos_white.png' }}" class="w-76 text-white" alt="FALLA2aaa">
        <img src="{{ base_path().'\public\storage\images\file_example_JPG_100kB.jpg' }}" class="w-76 text-white" alt="FALLA2aaa">
        <img src="{{ URL::asset('images\ComunityView-logos_white.png') }}" class="w-76 text-white"  alt="tag">
        
@endsection


