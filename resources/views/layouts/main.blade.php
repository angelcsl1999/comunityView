<!DOCTYPE html>
<html lang="es">
    <head>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans bg-gray-800 text-white">
        <nav class="border-b border-gray-800">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6"> 
                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                        <a href="#">INSERTAR FOTO AQUI</a>
                    </li>
                    <!-- Menu principal -->
                    <li class="md:ml-16 mt-2 md:mt-0">
                        <a href="{{url('/movies')}}" class="hover:text-gray-300">Peliculas</a>
                    </li>
                    <li class="md:ml-6 mt-2 md:mt-0">
                        <a href="#" class="hover:text-gray-300">Series</a>
                    </li>
                    <li class="md:ml-6 mt-2 md:mt-0">
                        <a href="#" class="hover:text-gray-300">Actores</a>
                    </li>
                </ul>
                <!--  Perfil y barra de busqueda -->
                <div class="flex flex-col md:flex-row items-center">
                    <livewire:search-dropdown>
                    
                
                    <div class="md:ml-4 mt-2 md:mt-0">
                        <img src="profile.svg" alt="avatar" class="rounded-full w-8 h-8">
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
        @livewireScripts
    </body>
</html>