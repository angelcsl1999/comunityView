<!DOCTYPE html>
    <html lang="es">
    <head>    
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>
            Insertar svg
        </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-800">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
