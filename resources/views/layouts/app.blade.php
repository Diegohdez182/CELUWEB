<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CELUWEB.COM - @yield('titulo')</title>
        @vite('resources/css/app.css')
        

        <link href="{{ asset('helpers/v2/main.css?v=1') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/daypilot-all.min.js?v=1') }}"></script>
        <link href="{{ asset('helpers/v2/app.js?v=1') }}" rel="stylesheet" type="text/css">



    </head>
    <body class="bg-slate-400">
        <!-- <h1 class="text-4xl font-extrabold">@yield('titulo')</h1>        
        <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700"> -->

        <header class="p-3 border-b bg-white shadow">
            <div class="border-8 container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    Calendario CELUWEB.COM
                </h1>

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

        <main class="container mx-auto mt-10 border-8">
            <h2 class="font-black text-center text-2xl mb-6">
                @yield('titulo')
            </h2>
            @yield('contenido')

        </main>

        <br><br>
        <div class="container" width="100vw">

            <div id="dp"></div>
        </div>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            CELUWEB.COM ALL RIGHTS RESERVED
            {{now()->year}}
        </footer>
    </body>

    
</html>


<script type="text/javascript">

const dp = new DayPilot.Calendar("dp", {
    startDate: DayPilot.Date.today(),
    days: 7,
    columnWidthSpec: "Fixed",
    columnWidth: 100,
    onTimeRangeSelected: async args => {
        const modal = await DayPilot.Modal.prompt("Nuevo Evento:", "");
        if (modal.canceled) {
            return;
        }
        dp.events.add({
            start: args.start,
            end: args.end,
            id: DayPilot.guid(),
            resource: args.resource,
            text: modal.result
        });
        dp.clearSelection();
        dp.message("Creado");
    },
    onEventClick: async args => {
        const modal = await DayPilot.Modal.prompt("Modificar Evento:", args.e.data.text);
        if (modal.canceled) {
            return;
        }
        args.e.data.text = modal.result;
        dp.events.update(args.e);
        dp.message("Actualizado");
    },
    onEventDelete: async args => {
        if (confirm("¿Estás seguro de que quieres eliminar este evento?")) {
            dp.events.remove(args.e.data);
            dp.message("Eliminado");
        }
    }
});

dp.init();
</script>



