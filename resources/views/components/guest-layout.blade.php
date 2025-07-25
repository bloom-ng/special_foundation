<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Tailwind CSS -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']); --}}

    <link rel="stylesheet" href="{{ asset('css/font.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}" /> --}}

    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/images/fav.png" type="image/x-icon">

    {{-- CHAT BOT --}}
    <script type="module" crossorigin src="/chat-assets/index-7ERj4ebV.js"></script>
    <link rel="stylesheet" crossorigin href="/chat-assets/index-BTRmF25J.css">

    <!-- Include Mont Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Include Orbitron Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css"
        integrity="sha512-kMPqFnKueEwgQFzXLEEl671aHhQqrZLS5IP3HzqdfozaST/EgU+/wkM07JCmXFAt9GO810I//8DBonsJUzGQsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ config('app.name', 'Special Foundation') }}" />
    <meta name="description" content="Special Foundation - Empowering Communities" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ config('app.name', 'Special Foundation') }}" />
    <meta property="og:description" content="Special Foundation - Empowering Communities" />
    <meta property="og:image" content="{{ asset('images/og_graph.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url()->current() }}" />
    <meta property="twitter:title" content="{{ config('app.name', 'Special Foundation') }}" />
    <meta property="twitter:description" content="Special Foundation - Empowering Communities" />
    <meta property="twitter:image" content="{{ asset('images/og_graph.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>
    @stack('head')
</head>

<body>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "green",
                stopOnFocus: true,
                ariaLive: "polite",
                onClick: function() {}
            }).showToast();
        </script>
    @endif

    @if (session('error'))
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "red",
                stopOnFocus: true,
                ariaLive: "polite",
                onClick: function() {}
            }).showToast();
        </script>
    @endif
    @if ($errors->any())
        <div class="text-red-400 p-2 text-xs font-extralight">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <nav
        class="bg-white text-lg text-black flex flex-col lg:flex-row justify-between gap-4 p-6 lg:py-8 lg:px-8 xl:px-16">
        <div class="flex items-center justify-between w-full lg:w-fit">
            <div class="flex flex-row gap-4 lg:gap-6 justify-center items-center">
                <a href="/">
                    <img class="w-8 lg:w-10" src="/images/the-special-youth-leadership-foundation-03.png"
                        alt="" />
                </a>
                <a href="/">
                    <img class="w-22 h-4 lg:w-36 lg:h-5" src="/images/the-special-youth-leadership-foundation-02.png"
                        alt="" />
                </a>
            </div>
            <div class="flex items-center lg:hidden">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <img src="/images/hamburger.svg" alt="Menu Icon" class="w-6 h-6" id="menu-icon" />
                </button>
            </div>
        </div>
        <div id="menu"
            class="hidden grid lg:flex flex-col lg:flex-row justify-start lg:justify-center items-start lg:items-center gap-6 xl:gap-14 lg:text-sm xl:text-sm montserrat-medium w-full lg:w-auto">
            <a href="/"
                class="{{ $page == 'home' ? 'text-[#25A8D6] montserrat-bold font-extrabold' : 'text-black font-medium' }}">HOME</a>
            <div class="relative">
                <button id="programs-button"
                    class="{{ $page == 'programs' ? 'text-[#25A8D6] montserrat-bold font-extrabold' : 'text-black font-medium' }} flex gap-2 items-center justify-center focus:outline-none">
                    <span>PROGRAMS</span>
                    <img id="programs-icon" class="pt-1 transform transition-transform" src="/images/collapse-arrow.svg"
                        alt="Collapse Arrow" />
                </button>
                <div id="programs-dropdown" class="hidden absolute bg-white shadow-md mt-2 rounded-lg z-20">
                    <a href="/inspire-program" class="block px-4 py-2 text-black hover:bg-gray-200">Inspire
                        Scholarship</a>
                    <a href="/special-scholarship-program" class="block px-4 py-2 text-black hover:bg-gray-200">Special
                        Scholarship</a>
                    <a href="/mentorship-program" class="block px-4 py-2 text-black hover:bg-gray-200">Mentorship
                        Program</a>
                    <a href="/summer-school-program" class="block px-4 py-2 text-black hover:bg-gray-200">Special Summer
                        School</a>
                    <a href="/life-long-program" class="block px-4 py-2 text-black hover:bg-gray-200">Lifelong
                        Development</a>
                    <a href="/school-build" class="block px-4 py-2 text-black hover:bg-gray-200">School Build</a>
                </div>
            </div>
            <a class="{{ $page == 'who_we_are' ? 'text-[#25A8D6] montserrat-bold font-extrabold' : 'text-black font-medium' }}"
                href="/who-we-are">WHO
                WE
                ARE</a>

            <div class="relative">
                <button id="communications-button"
                    class="{{ $page == 'blog' ? 'text-[#25A8D6] montserrat-bold font-extrabold' : 'text-black font-medium' }} flex gap-2 items-center justify-center focus:outline-none">
                    <span>MEDIA</span>
                    <img id="communications-icon" class="pt-1 transform transition-transform"
                        src="/images/collapse-arrow.svg" alt="Collapse Arrow" />
                </button>
                <div id="communications-dropdown"
                    class="hidden absolute bg-white shadow-md mt-2 rounded-lg z-20 w-40">
                    <a href="/blogs" class="block px-4 py-2 text-black hover:bg-gray-200">Blog</a>
                    <a href="/social-media-posts" class="block px-4 py-2 text-black hover:bg-gray-200">Social Media
                        Posts</a>
                    <a href="/gallery" class="block px-4 py-2 text-black hover:bg-gray-200">Gallery</a>
                    <a href="/project" class="block px-4 py-2 text-black hover:bg-gray-200">Project Schedule</a>
                </div>
            </div>
            <a class="{{ $page == 'get_involved' ? 'text-[#25A8D6] montserrat-bold font-extrabold' : 'text-black font-medium' }}"
                href="/get-involved">GET
                INVOLVED</a>
            <a class="{{ $page == 'donate' ? 'montserrat-bold font-extrabold' : 'font-medium' }} rounded-full px-10 py-2 bg-[#25A8D6] text-white text-center"
                href="/donate">DONATE</a>
        </div>
    </nav>
    <div class="w-full">
        {{ $slot }}
    </div>
    {{-- Chat Module --}}
    <div class="fixed bottom-0 right-0 mb-4 mr-2 z-10" id="chat"></div>

    <!-- footer -->
    <x-footer></x-footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('menu');
            const menuIcon = document.getElementById('menu-icon');
            const programsButton = document.getElementById('programs-button');
            const programsDropdown = document.getElementById('programs-dropdown');
            const programsIcon = document.getElementById('programs-icon');
            const communicationsButton = document.getElementById('communications-button');
            const communicationsDropdown = document.getElementById('communications-dropdown');
            const communicationsIcon = document.getElementById('communications-icon');

            mobileMenuButton.addEventListener('click', function() {
                menu.classList.toggle('hidden');
                menuIcon.src = menu.classList.contains('hidden') ? '/images/hamburger.svg' :
                    '/images/close_menu.svg';
            });

            programsButton.addEventListener('click', function() {
                programsDropdown.classList.toggle('hidden');
                programsIcon.classList.toggle('rotate-180');
            });

            communicationsButton.addEventListener('click', function() {
                communicationsDropdown.classList.toggle('hidden');
                communicationsIcon.classList.toggle('rotate-180');
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"
        integrity="sha512-v3fZyWIk7kh9yGNQZf1SnSjIxjAKsYbg6UQ+B+QxAZqJQLrN3jMjrdNwcxV6tis6S0s1xyVDZrDz9UoRLfRpWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const createOdometer = (el, value) => {
            const odometer = new Odometer({
                el: el,
                value: 0,
            });

            let hasRun = false;

            const options = {
                threshold: [0, 0.9],
            };

            const callback = (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        if (!hasRun) {
                            odometer.update(value);
                            hasRun = true;
                        }
                    }
                });
            };

            const observer = new IntersectionObserver(callback, options);
            observer.observe(el);
        };

        const odometer1 = document.querySelector(".odometer-1");
        createOdometer(odometer1, 38095);

        const odometer2 = document.querySelector(".odometer-2");
        createOdometer(odometer2, 619);

        const odometer3 = document.querySelector(".odometer-3");
        createOdometer(odometer3, 18086);

        const odometer4 = document.querySelector(".odometer-4");
        createOdometer(odometer4, 10165);

        const odometer5 = document.querySelector(".odometer-5");
        createOdometer(odometer5, 14);

        const meter1 = document.querySelector(".odometer-6");
        createOdometer(meter1, 100000);

        const meter2 = document.querySelector(".meter-2");
        createOdometer(meter2, 5000);

        const meter3 = document.querySelector(".meter-3");
        createOdometer(meter3, 20000);

        const meter4 = document.querySelector(".meter-4");
        createOdometer(meter4, 60000);

        const meter5 = document.querySelector(".meter-5");
        createOdometer(meter5, 100);
    </script>
</body>

</html>
