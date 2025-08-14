<html>
    <head>
        <title>SPRINT TRADING</title>
          @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>

      <style>
                { display: none !important; }


        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
        }

</style>


    <body class="bg-blue-100 bg-opacity-65 font-display">

        <main class="w-full max-w-full mx-auto  p-2">

            <section class=" p-2 flex">

                    {{-- <div class="w-full max-w-[20%] h-40 bg-slate-400">
                        logo
                    </div> --}}

                    <div class="w-full">
                       @component('components.navbar')

                       @endcomponent
                    </div>

            </section>

            <section class="p-2">

                <div class="w-[95%] mx-auto">
                    @yield('content')
                 </div>

            </section>


        </main>



    </body>
</html>
