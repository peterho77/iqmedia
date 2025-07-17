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
        ])

        {{-- fix lỗi FOUC --}}
        <style>html{visibility: hidden;opacity:0;}</style>
    </head>

    <body>
        @include('components.side-bar')

        <main class="main-content">
            @include('components.header')

            <main>
                @yield('content')
            </main>

            @include('components.footer')
        </main>

        @stack('scripts')
    </body>

</html>