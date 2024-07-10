<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" /> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Special Foundation') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="/resources/sass/app.scss">
    <link rel="stylesheet" href="/resources/css/app.css"> --}}

    <!-- Scripts -->
    @vite('resources/js/app.js')
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css']) --}}
</head>

<body>
    <div id="app2">
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto flex justify-between items-center px-4 py-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="w-12 lg:w-16" src="/images/the-special-youth-leadership-foundation-03.png"
                        alt="" />
                </a>
                <button class="block lg:hidden navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="flex flex-col lg:flex-row lg:ml-auto">
                        <h1 class="text-sm"></h1>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="flex flex-col lg:flex-row lg:ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-gray-700 hover:text-gray-900 px-4 py-2"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="relative nav-item dropdown">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle text-gray-700 hover:text-gray-900 px-4 py-2"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu absolute right-0 mt-2 py-2 w-48 bg-white border rounded shadow-xl"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>


</html>
