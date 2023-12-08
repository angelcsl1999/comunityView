<!DOCTYPE html>
<html lang="es">
    <head>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title> ComunityView</title>
        <link rel="icon" type="image/x-icon" href=" {{asset('storage/images/ComunityView-logos_white.png') }}">
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans bg-gray-800 ">
        <nav class="border-b border-gray-800 text-white">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6"> 
                <ul class="flex flex-col md:flex-row items-center">
                    <li class="md:ml-16 mt-2 md:mt-0">
                        <a href="{{url('/')}}">
                            <img src=" {{asset('storage/images/ComunityView-logos_white.png') }}" class="object-fill h-48 w-70 text-white" alt="ComunityView">
                        </a>
                    </li>
                    <!-- Menu principal -->
                    <li class="md:ml-16 mt-2 md:mt-0">
                        <a href="{{url('/movies')}}" class="hover:text-gray-300">Peliculas</a>
                    </li>
                    <li class="md:ml-6 mt-2 md:mt-0">
                        <a href="{{ url('/TVShows') }}" class="hover:text-gray-300">Series</a>
                    </li>
                    <li class="md:ml-6 mt-2 md:mt-0">
                        <a href="{{ url('/actors') }}" class="hover:text-gray-300">Actores</a>
                    </li>
                </ul>
                <!--  Perfil y barra de busqueda -->
                <div class="flex flex-col md:flex-row items-center">
                    <livewire:search-dropdown>
                    
                
                    <div class="relative mt-2 md:mt-0">
                        @if (Route::has('login'))
                            <div class="top-0 right-0 px-6 py-4 sm:block">
                                @auth                                     

                                     <div class="hidden sm:flex sm:items-center sm:ml-6 ">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-mdborder-b border-gray-800 text-white focus:outline-none transition ease-in-out duration-150">
                                                    <div>{{ Auth::user()->name }}</div>
                        
                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>
                        
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('profile.edit')">
                                                    {{ __('Perfil') }}
                                                </x-dropdown-link>
                        
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                        
                                                    <x-dropdown-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                        {{ __('Desconectar') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>




                                @else
                                    <a href="{{ route('login') }}" class="text-sm hover:text-gray-300 underline">Iniciar sesion</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm hover:text-gray-300 underline">Registrarse</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        
        






        @yield('content')
        @livewireScripts
        @yield('scripts')
    </body>
</html>