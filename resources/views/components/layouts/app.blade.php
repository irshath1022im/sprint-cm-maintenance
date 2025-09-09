<html>
    <head>
        <title>SPRINT TRADING</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

            <section class=" p-2 flex print:hidden">


                    <div class="w-full ">
                       @component('components.navbar')

                       @endcomponent

                    </div>

            </section>

            <section class="relative sm:p-2">

                <div class="w-full mx-auto sm:w-full text-[12px] sm:text-sm md:text-base">
                    @yield('content')
                 </div>

            </section>


        </main>


    </body>
</html>
