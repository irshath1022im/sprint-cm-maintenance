<html>
    <head>
        <title>App Name - @yield('title')</title>
          @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>

      <style>
                { display: none !important; }
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
