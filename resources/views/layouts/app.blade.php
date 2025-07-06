<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'IQ Media')</title>

        <!-- Bootstrap CSS từ Vite -->
        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
            'public/css/reset.css',
            'public/css/style.css',
            'public/js/script.js'
        ])

        <!-- Custom CSS -->

        @stack('styles')
    </head>

    <body>
        @include('components.header')

        <main>
            @yield('content')
        </main>

        @include('components.footer')

        @stack('scripts')
    </body>

</html>