<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Include Tailwind CSS -->
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="{{ asset('css/font.css') }}" />

        <!-- Include Poppins Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
        <!-- Include Mont Font -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        /> -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    </head>

    <body>
        <div
            class="bg-white text-lg text-black flex flex-row justify-between gap-12 my-6 mx-20"
        >
            <div class="flex flex-row gap-6 justify-center items-center">
                <a href="">
                    <img
                        class="w-10"
                        src="/images/the-special-youth-leadership-foundation-03.png"
                        alt=""
                    />
                </a>
                <a href="">
                    <img
                        class="w-36 h-5"
                        src="/images/the-special-youth-leadership-foundation-02.png"
                        alt=""
                    />
                </a>
            </div>
            <div
                class="flex justify-between justify-center items-center gap-16 text-base poppins-medium"
            >
                <a href="#" class="">HOME</a>
                <div
                    class="flex text-[#25A8D6] gap-2 items-center justify-center"
                >
                    <a href="#" class="poppins-bold">PROGRAMS</a>
                    <img
                        class="pt-1"
                        src="/images/collapse-arrow.svg"
                        alt="Collapse Arrow"
                    />
                </div>
                <a href="#">WHO WE ARE</a>
                <a href="#">BLOG</a>
                <a href="#">GET INVOLVED</a>
                <a
                    href="#"
                    class="text-white bg-[#25A8D6] px-10 py-2 -mt-2 rounded-full"
                    >DONATE</a
                >
            </div>
        </div>
        <div
            class="relative bg-cover bg-center h-40"
            style="background-image: url('/images/rectangle-background.png')"
        >
            <div class="absolute z-10 inset-0 bg-[#26225F] bg-opacity-75">
                <div
                    class="mt-14 flex flex-row justify-center text-[35px] poppins-semibold text-[#25A8D6]"
                >
                    Who We Are
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="mx-20 py-20">
                <div class="flex flex-row gap-28">
                    <div class="basis-3/7 pt-6 text-xs poppins-regular">
                        <p class="pb-4 border-[#25A8D6] pl-5 border-l-[14px]">
                            The Special Foundation is a social impact
                            organisation that focuses on raising young African
                            leaders through education by providing platforms and
                            opportunities to fulfil their dreams. We are a
                            community of young professionals with a vision to
                            improve the quality of leadership in all spheres of
                            governance in Africa by creating access for more
                            children to get an education.
                        </p>
                        <p class="border-[#25A8D6] pl-5 border-l-[14px]">
                            Founded by Seyi Akinwale in 2018 through his vision
                            to improve the quality of leadership in all spheres
                            of governance in Africa and ensure the creation of a
                            platform where more young people can maximize their
                            potential by gaining access to education. The
                            foundation has empowered over 21,000 less
                            privileged, gifted African Children through
                            education, mentorship, and leadership opportunities.
                        </p>
                    </div>
                    <div class="basis-4/7 pl-6">
                        <img src="/images/obasanjo.png" alt="" />
                    </div>
                </div>
                <div class="flex flex-row pt-20">
                    <div class="basis-3/7 gap-12 flex flex-col">
                        <div
                            class="flex flex-col bg-[#25A8D6] text-white mx-10 py-6 w-96"
                        >
                            <img
                                class="w-16"
                                src="/images/goal-icon.png"
                                alt=""
                            />
                            <h1 class="text-2xl">Our Mission</h1>
                            <p class="text-[8px] poppins-light">
                                To improve the quality of leadership in Africa
                                by providing a platform where less privileged
                                and highly talented children can be equipped
                                with an education, mentoring and leadership
                                training to bring about a positive influence to
                                their world.
                            </p>
                        </div>
                    </div>
                    <div class="basis-4/7 flex"></div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <x-footer></x-footer>
    </body>
</html>
