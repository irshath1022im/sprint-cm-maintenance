<html>
    <head>
        <title>App Name - @yield('title')</title>
          @vite(['resources/css/app.css', 'resources/js/app.js'])


    </head>

      <style>
                { display: none !important; }
            </style>

    <body class="bg-blue-50">

        <main class="container mx-auto flex border p-2">

            <section class="basis-1/4 p-2">

                    <div class="w-full h-40 bg-slate-400">
                        logo
                    </div>

                    <div class="mt-2">
                       @component('components.navbar')

                       @endcomponent
                    </div>

            </section>

            <section class="basis-3/4 p-2">

                <div class="container mx-auto">
                    @yield('content')
                 </div>

            </section>





    </body>
</html>
