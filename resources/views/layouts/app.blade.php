<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CELUWEB.COM - @yield('titulo')</title>
        @vite('resources/css/app.css')

    </head>
    <body class="bg-slate-400">

        <header class="p-2 border-b bg-white shadow">
            <div class="border-4 container mx-auto flex justify-between items-center">
                <div class="md:w-20">
                    <img src="{{asset('img/logo_empresarial.png')}}" alt="LOGO">
                </div>

                @auth
                    <nav class="p-2 flex gap-3">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="#">
                            Bienvenido: <span class="font-normal"> {{auth()->user()->username}}
                        </a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('logout')}}">cerrar Sesion</a>
                    </nav>     
                @endauth
                @guest
                    <nav class="p-2 flex gap-3">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Registrarse</a>
                    </nav>     
                @endguest
                           
            </div>
        </header>

        <main class="container mx-auto mt-4 border-8">
            <h2 class="font-black text-center text-2xl mb-6">
                @yield('titulo')
            </h2>
            @yield('contenido')

        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            CELUWEB.COM ALL RIGHTS RESERVED
            {{now()->year}}
        </footer>

        @stack('scripts');
    </body>

    
</html>