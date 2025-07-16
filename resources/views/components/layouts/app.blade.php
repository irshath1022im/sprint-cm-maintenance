<html>
    <head>
        <title>App Name - @yield('title')</title>

          @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-blue-50">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </body>
</html>
