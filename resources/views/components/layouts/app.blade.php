<html>
    <head>
        <title>App Name - @yield('title')</title>
          @vite(['resources/css/app.css', 'resources/js/app.js'])
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=done_outline" />


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


    <body class="bg-blue-20">

        <main class="w-full max-w-[90%] mx-auto  p-2">

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

                <div class="container mx-auto">
                    @yield('content')
                 </div>

            </section>


        </main>



    </body>
</html>
