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
                <a href="#" class="text-[#25A8D6] poppins-bold">HOME</a>
                <div class="flex gap-2 items-center justify-center">
                    <a href="#" class="">PROGRAMS</a>
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
        <div class="max-h-[100vh] max-w-[100vw]">
            <swiper-container
                slides-per-view="1"
                speed="900"
                loop="true"
                autoPlay="true"
                css-mode="true"
                class="flex max-w-[100vw] justify-between items-center"
            >
                <swiper-slide class=""
                    ><img src="/images/carousel-1.png" alt="" class="w-[100vw]"
                /></swiper-slide>
                <swiper-slide class=""
                    ><img src="/images/carousel-2.png" alt="" class="w-[100vw]"
                /></swiper-slide>
                <swiper-slide class=""
                    ><img src="/images/carousel-3.png" alt="" class="w-[100vw]"
                /></swiper-slide>
            </swiper-container>
        </div>
        <div class="mx-20 py-20 flex flex-row gap-20">
            <div class="basis-4/5 flex flex-col gap-16">
                <div class="flex flex-row gap-10">
                    <div class="poppins-medium text-xs basis-3/5">
                        <h1
                            class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-6"
                        >
                            Who We Are
                        </h1>
                        <div class="">
                            <p class="border-[#25A8D6] pl-5 border-l-[14px]">
                                The Special Foundation is a social impact
                                organisation that focuses on raising young
                                African leaders through education by providing
                                platforms and opportunities to fulfil their
                                dreams. We are a community of young
                                professionals with a vision to improve the
                                quality of leadership in all spheres of
                                governance in Africa by creating access for more
                                children to get an education. <br />
                                <br />

                                Founded by Seyi Akinwale in 2018 through his
                                vision to improve the quality of leadership in
                                all spheres of governance in Africa and ensure
                                the creation of a platform where more young
                                people can maximize their potential by gaining
                                access to education. The foundation has
                                empowered over 21,000 less privileged, gifted
                                African Children through education, mentorship,
                                and leadership opportunities.
                            </p>
                        </div>
                    </div>
                    <div class="basis-2/5">
                        <img
                            class="w-full h-[278px]"
                            src="/images/small-rectangle.png"
                            alt=""
                        />
                    </div>
                </div>
                <div class="relative">
                    <img src="/images/bigger-rectangle.png" alt="" />
                    <div class="absolute z-10 right-0 bottom-0 p-20">
                        <a
                            href="#"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 -mt-2 rounded-full"
                            >READ MORE</a
                        >
                    </div>
                </div>
            </div>
            <div class="poppins-medium text-xs basis-1/5">
                <div class="pb-10">
                    <h1
                        class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-3"
                    >
                        21,000+
                    </h1>
                    <p class="">
                        Nigerian children directly and indirectly impacted by
                        the foundation over the last 5 years
                    </p>
                </div>
                <div class="pb-10">
                    <h1
                        class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-3"
                    >
                        460+
                    </h1>
                    <p class="">
                        Nigerian children are given access to education through
                        the Inspire Scholarship Pprogram yearly
                    </p>
                </div>
                <div class="pb-10">
                    <h1
                        class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-3"
                    >
                        10,672+
                    </h1>
                    <p class="">
                        Nigerian children access educational and vocational
                        training through the free Summer School Program yearly
                    </p>
                </div>
                <div class="pb-10">
                    <h1
                        class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-3"
                    >
                        6,879+
                    </h1>
                    <p class="">
                        Nigerian children accessing mentorship through our
                        Mentorship/Career Day Program
                    </p>
                </div>
                <div class="pb-10">
                    <h1
                        class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-3"
                    >
                        5+
                    </h1>
                    <p class="">
                        Nigerian Schools accessing conducive learning
                        environment through our school build project
                    </p>
                </div>
            </div>
        </div>
        <div class="bg-[#26225F]">
            <div
                class="mx-20 pt-20 pb-12 text-[#25A8D6] poppins-bold text-[38px] leading-[45px]"
            >
                Our Programs
            </div>
            <swiper-container
                slides-per-view="4"
                speed="500"
                loop="true"
                autoplay="true"
                css-mode="true"
                class="swiper-container-second flex flex-row gap-12 pb-16 mx-8"
            >
                <swiper-slide class="">
                    <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                        <h1
                            class="text-[#25A8D6] leading-[22px] pb-4 text-xl poppins-bold"
                        >
                            Inspire Scholarship
                        </h1>
                        <p class="poppins-medium text-xs pb-16">
                            This scholarship is targeted at orphaned and
                            vulnerable children in disadvantaged communities. We
                            provide tuition (including cost of books and other
                            materials) to children in primary and secondary
                            schools.
                        </p>
                        <div class="">
                            <a
                                href="#"
                                class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full"
                                >LEARN MORE</a
                            >
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="">
                    <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                        <h1
                            class="text-[#25A8D6] leading-[22px] pb-4 text-xl poppins-bold"
                        >
                            Lifelong Development
                        </h1>
                        <p class="poppins-medium text-xs pb-16">
                            The Special Foundation facilitates continuous
                            development of the children we support through a
                            lifelong program. The program includes mentorship
                            and leadership training.
                        </p>
                        <div class="">
                            <a
                                href="#"
                                class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full"
                                >LEARN MORE</a
                            >
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="">
                    <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                        <h1
                            class="text-[#25A8D6] leading-[22px] pb-4 text-xl poppins-bold"
                        >
                            Mentorship/Career Day Program
                        </h1>
                        <p class="poppins-medium text-xs pb-12">
                            This is a merit-based program that focuses on
                            identifying young talents through a rigorous
                            selection process and linking them with
                            opportunities or platforms that will allow them best
                            fulfill their potential.
                        </p>
                        <div class="">
                            <a
                                href="#"
                                class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full"
                                >LEARN MORE</a
                            >
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="">
                    <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                        <h1
                            class="text-[#25A8D6] leading-[22px] pb-4 text-xl poppins-bold"
                        >
                            School <br />
                            Builds
                        </h1>
                        <p class="poppins-medium text-xs pb-12">
                            The Special Foundation seeks to build schools to
                            make sure more children have access to a safe and
                            quality learning environment. We believe this is
                            critical to ensuring more children gain access to
                            quality education.
                        </p>
                        <div class="">
                            <a
                                href="#"
                                class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full"
                                >LEARN MORE</a
                            >
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide class="">
                    <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                        <h1
                            class="text-[#25A8D6] leading-[22px] pb-4 text-xl poppins-bold"
                        >
                            Special <br />
                            Scholarship
                        </h1>
                        <p class="poppins-medium text-xs pb-16">
                            Special Scholarship is merit based and targeted at
                            identifying gifted students for local tertiary
                            institutions. This scholarship is available to
                            students under the age of 21 and covers tuition.
                        </p>
                        <div class="">
                            <a
                                href="#"
                                class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full"
                                >LEARN MORE</a
                            >
                        </div>
                    </div>
                </swiper-slide>
            </swiper-container>
        </div>
        <div class="bg-white mx-20 py-20">
            <div class="flex flex-row gap-28">
                <div class="poppins-medium text-xs basis-3/5">
                    <h1
                        class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-6"
                    >
                        Supporting the UN’s SD Goals
                    </h1>
                    <div class="">
                        <p class="border-[#25A8D6] pl-5 border-l-[14px]">
                            Africa has the youngest population in the world,
                            with 70% of sub-Saharan Africa under the age of 30.
                            Such a high number of young people is an opportunity
                            for the continent’s growth – but only if these new
                            generations are fully empowered to realize their
                            best potential. It is especially important that
                            young people are included in decision making and
                            given appropriate opportunities for work and to
                            innovate. The Special Foundation’s programs provide
                            the youths lifelong skills that empowers them to
                            realize their potentials. <br /><br />
                            The Special Foundation is committed to helping the
                            United Nations achieve its Sustainable Development
                            Goals (SDGs) by tailoring our programs to promote
                            and contribute towards its goals and helping to
                            build a sustainable future for all. <br /><br />
                            Here are some of the goals we are focused on. Click
                            on each one to know how you can support the goals we
                            feel most passionately about:
                        </p>
                    </div>
                </div>
                <div class="basis-2/5">
                    <div class="w-96 grid grid-cols-4 gap-2">
                        <div>
                            <img class="" src="/images/sdg-1.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-2.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-4.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-5.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-8.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-9.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-11.png" alt="" />
                        </div>
                        <div>
                            <img class="" src="/images/sdg-13.png" alt="" />
                        </div>
                    </div>
                    <div class="flex flex-row pt-2 items-center justify-center">
                        <img
                            class="w-[90px] -ml-12"
                            src="/images/sdg-16.png"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mx-20">
            <div>
                <h1
                    class="poppins-bold text-[#26225F] text-[38px] leading-[45px] pb-10"
                >
                    Our Partners
                </h1>
            </div>
            <div>
                <swiper-container
                    slides-per-view="4"
                    speed="500"
                    loop="true"
                    autoplay="true"
                    css-mode="true"
                    class="swiper-container-second flex flex-row gap-12 pb-24"
                >
                    <swiper-slide class="">
                        <img
                            src="/images/1-microsoft-logo.png"
                            alt=""
                        /> </swiper-slide
                    ><swiper-slide class="pl-16">
                        <img
                            src="/images/2-google-logo.png"
                            alt=""
                        /> </swiper-slide
                    ><swiper-slide class="pl-16">
                        <img src="/images/3-logo.png" alt="" /> </swiper-slide
                    ><swiper-slide class="">
                        <img
                            src="/images/4-firstep_lg.png"
                            alt=""
                        /> </swiper-slide
                    ><swiper-slide class="pl-16">
                        <img
                            src="/images/6-gardaworld_logo.png"
                            alt=""
                        /> </swiper-slide
                    ><swiper-slide class="">
                        <img src="/images/7-greychapel-legal-logo.png" alt="" />
                    </swiper-slide>
                </swiper-container>
            </div>
        </div>
        <div class="bg-[#26225F]">
            <div class="relative text-white py-20 mx-20 flex flex-row gap-20">
                <div class="basis-3/5">
                    <div class="pb-12">
                        <h1
                            class="poppins-bold text-[#25A8D6] text-[38px] leading-[45px] pb-5"
                        >
                            Subscribe to our Newsletter
                        </h1>
                        <p class="poppins-medium text-xs">
                            To receive regular updates of the Special
                            Foundation’s work, subscribe below
                        </p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div>
                            <input
                                class="w-full bg-white-70 placeholder:text-slate-600 placeholder:text-xs placeholder:poppins ps-12 py-4 rounded-full border border-1 border-[#25A8D6]"
                                type="text"
                                placeholder="Full Name"
                            />
                        </div>
                        <div>
                            <input
                                class="w-full bg-white-70 placeholder:text-slate-600 placeholder:text-xs placeholder:poppins ps-12 py-4 rounded-full border border-1 border-[#25A8D6]"
                                type="text"
                                placeholder="Your Email"
                            />
                        </div>
                    </div>
                    <div class="pt-14">
                        <p
                            class="text-center rounded-full w-full py-3 text-white bg-[#25A8D6]"
                        >
                            SUBSCRIBE
                        </p>
                    </div>
                </div>
                <img
                    class="absolute -mt-40 -mr-20 right-0 top-0 basis-2/5 z-20 w-[750px]"
                    src="/images/email-symbol.png"
                    alt=""
                />
            </div>
        </div>
    </body>
</html>
