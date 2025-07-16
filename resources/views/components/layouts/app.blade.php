<html>
    <head>
        <title>App Name - @yield('title')</title>

          @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-blue-500">
        <div class="container bg-blue-500">
            @yield('content')
        </div>
    </body>
</html>
