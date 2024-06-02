<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Tailwind CSS -->
    @vite('/resources/css/app.css')

    <link rel="stylesheet" href="{{ asset('css/font.css') }}" />

    <title>{{ $title }}</title>

    {{-- CHAT BOT --}}
    <script type="module" crossorigin src="/chat-assets/index-sGn6lMje.js"></script>
    <link rel="stylesheet" crossorigin href="/chat-assets/index-CEHLkopw.css">

    <!-- Include Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- Include Mont Font -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        /> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

    <style>
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="bg-white text-lg text-black flex flex-row justify-between gap-12 my-6 mx-20">
        <div class="flex flex-row gap-6 justify-center items-center">
            <a href="">
                <img class="w-10" src="/images/the-special-youth-leadership-foundation-03.png" alt="" />
            </a>
            <a href="">
                <img class="w-36 h-5" src="/images/the-special-youth-leadership-foundation-02.png" alt="" />
            </a>
        </div>
        <div class="flex justify-between justify-center items-center gap-16 text-base poppins-medium">
            <a href="#" class="text-[#25A8D6] poppins-bold">HOME</a>
            <div class="flex gap-2 items-center justify-center">
                <a href="#" class="">PROGRAMS</a>
                <img class="pt-1" src="/images/collapse-arrow.svg" alt="Collapse Arrow" />
            </div>
            <a href="#">WHO WE ARE</a>
            <a href="#">BLOG</a>
            <a href="#">GET INVOLVED</a>
            <a href="#" class="text-white bg-[#25A8D6] px-10 py-2 -mt-2 rounded-full">DONATE</a>
        </div>
    </div>
    {{ $slot }}
    {{-- Chat Module --}}
    <div class="fixed bottom-0 right-0 mb-4 mr-2 z-50" id="chat"></div>
    <!-- footer -->
    <x-footer></x-footer>
</body>

</html>
