<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Litenotes') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
       {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
   <body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen relative">
    @if (Route::has('login'))
        <header class="absolute top-6 right-6 lg:top-8 lg:right-8 z-10 text-sm">
            <nav class="flex items-center gap-4">
                @auth
                    <a
                        href="{{ url('/notes') }}"
                        class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal"
                    >
                        My Notes
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        </header>
    @endif

    <main class="min-h-screen w-full flex items-center justify-center px-6">
        <h1 class="text-5xl font-bold text-center">Welcome to Litenotes</h1>

    </main>
</body>
</html>
