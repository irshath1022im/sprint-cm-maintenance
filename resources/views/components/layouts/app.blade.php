<html>
    <head>
        <title>SPRINT TRADING</title>
          @vite(['resources/css/app.css', 'resources/js/app.js'])
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=done_outline" />
          <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


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


    <body class="bg-blue-100 bg-opacity-65 font-['poppins']">

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
