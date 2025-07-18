<x-guest-layout title="Special Foundation - Home" page="home">
    <div class="max-h-[100vh] max-w-[100vw]">
        <swiper-container pagination="true" slides-per-view="1" speed="900" loop="true" autoPlay="true" css-mode="true"
            class="flex max-w-[100vw] justify-between items-center">
            <swiper-slide class=""><img src="/images/hero_1.png" alt=""
                    class="w-[100vw]" /></swiper-slide>
            <swiper-slide class=""><img src="/images/hero_2.png" alt=""
                    class="w-[100vw]" /></swiper-slide>
            <swiper-slide class=""><img src="/images/hero_3.png" alt=""
                    class="w-[100vw]" /></swiper-slide>
        </swiper-container>
    </div>

    @if ($activeEvent)
        <div class="text-center py-8">
            <div id="countdown"
                class="text-[30px] md:text-[45px] lg:text-[60px] font-bold mt-5 mb-3 text-[#25A8D6] orbitron-bold">
            </div>
            <h3
                class="text-center text-[25px] md:text-[35px] lg:text-[40px] font-bold py-4 text-[#25A8D6] montserrat-bold">
                To</h3>
            <div class="max-w-[100%] mx-auto">
                <a href="{{ route('events.register', $activeEvent->id) }}" class="block">
                    <div class="relative w-full h-0 pb-[25%] overflow-hidden">
                        @if ($activeEvent->image_width && $activeEvent->image_height)
                            <img src="{{ Storage::url($activeEvent->image) }}" alt="{{ $activeEvent->name }}"
                                width="{{ $activeEvent->image_width }}" height="{{ $activeEvent->image_height }}"
                                class="absolute top-0 left-0 w-full h-full object-cover" />
                        @else
                            <img src="{{ Storage::url($activeEvent->image) }}" alt="{{ $activeEvent->name }}"
                                class="absolute top-0 left-0 w-full h-full object-cover" />
                        @endif
                    </div>
                </a>
            </div>
            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("{{ date('M d, Y H:i:s', strtotime($activeEvent->date)) }}").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {
                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element with id="countdown"
                    document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
                        minutes + "m " + seconds + "s ";

                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("countdown").innerHTML = "EXPIRED";
                    }
                }, 1000);
            </script>
        </div>
    @endif

    @if ($activeSummerSchool)
        <div class="text-center py-8">
            <h3 class="text-center text-[25px] md:text-[35px] lg:text-[40px] font-bold py-4 text-[#25A8D6] montserrat-bold">
                Summer School Volunteer Sign-Up
            </h3>
            <div class="max-w-[100%] mx-auto">
                <a href="{{ route('summer-school.register', $activeSummerSchool->id) }}" class="block">
                    <div class="relative w-full h-0 pb-[25%] overflow-hidden">
                        <img src="{{ Storage::url($activeSummerSchool->banner) }}" alt="Summer School Banner"
                            class="absolute top-0 left-0 w-full h-full object-cover" />
                    </div>
                </a>
            </div>
        </div>
    @endif

    <div class="mx-5 lg:mx-20 py-20 flex flex-col lg:flex-row gap-20">
        <div class="basis-4/5 flex flex-col gap-16">
            <div class="flex flex-col lg:flex-row gap-10">
                <div class="montserrat-light font-normal text-sm 2xl:text-base basis-3/5">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-6">
                        Who We Are
                    </h1>
                    <div class="">
                        <p class="border-[#25A8D6] pl-5 border-l-[14px]">
                            The Special Foundation is a social impact organisation that focuses on raising young African
                            leaders through education by providing platforms and opportunities to fulfil their dreams.
                            We are a community of young professionals with a vision to improve the quality of leadership
                            in all spheres of governance in Africa by creating access for more children to get an
                            education.
                            <br />
                            <br />
                            Founded by Seyi Akinwale in 2018 through his vision to improve the quality of leadership in
                            all spheres of governance in Africa and ensure the creation of a platform where more young
                            people can maximize their potential by gaining access to education. The foundation has
                            empowered over 38,000 less privileged, gifted African children through education,
                            mentorship, and leadership opportunities.
                        </p>
                    </div>
                </div>
                <div class="basis-2/5">
                    <img class="w-full min-h-[278px] h-auto 2xl:h-full" src="/images/home_1.png" alt="" />
                </div>
            </div>
            <div class="relative w-full h-[350px] lg:h-[550px] rounded-3xl"
                style="background-image: url('{{ asset('/images/home_2.png') }}'); background-repeat: no-repeat; background-size: cover;">
                {{-- <img src="/images/home_2.png" alt="" /> --}}
                <div class="absolute z-10 right-0 bottom-0 p-5 lg:p-20">
                    <a href="/who-we-are" class="text-white text-base bg-[#25A8D6] px-10 py-3 -mt-2 rounded-full">READ
                        MORE</a>
                </div>
            </div>
        </div>
        <div class="montserrat-light font-normal text-sm 2xl:text-base basis-1/5">
            <div class="pb-10">
                <div class="flex">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3 odometer-1">
                        {{-- 38,095+ --}}0
                    </h1>
                    <span class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] ml-1">+</span>
                </div>
                <p class="">
                    Nigerian children directly and indirectly impacted by
                    the foundation over the last 5 years
                </p>
            </div>
            <div class="pb-10">
                <div class="flex">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3 odometer-2">
                        {{-- 619+ --}}0
                    </h1>
                    <span class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] ml-1">+</span>
                </div>
                <p class="">
                    Nigerian children are given access to education through
                    the Inspire Scholarship Program yearly
                </p>
            </div>
            <div class="pb-10">
                <div class="flex">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3 odometer-3">
                        {{-- 18,086+ --}}0
                    </h1>
                    <span class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] ml-1">+</span>
                </div>
                <p class="">
                    Nigerian children access educational and vocational
                    training through the free Summer School Program yearly
                </p>
            </div>
            <div class="pb-10">
                <div class="flex">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3 odometer-4">
                        {{-- 10,165+ --}}0
                    </h1>
                    <span class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] ml-1">+</span>
                </div>
                <p class="">
                    Nigerian children accessing mentorship through our
                    Mentorship/Career Day Program
                </p>
            </div>
            <div class="pb-10">
                <div class="flex">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3 odometer-5">
                        {{-- 14+ --}}0
                    </h1>
                    <span class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] ml-1">+</span>
                </div>
                <p class="">
                    Nigerian Schools accessing conducive learning
                    environment through our school build project
                </p>
            </div>
        </div>
    </div>

    {{-- OUR PROGRAMS START --}}
    <div id="programs" class="bg-[#26225F]">
        <div class="mx-5 lg:mx-20 pt-20 pb-12 text-[#25A8D6] montserrat-bold text-[38px] leading-[45px]">
            Our Programs
        </div>
        <swiper-container slides-per-view="1" speed="500" loop="true" autoplay="true" css-mode="true"
            class="swiper-container-second flex lg:hidden flex-row pb-16 mx-5">
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Inspire Scholarship
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        This scholarship is targeted at orphaned and
                        vulnerable children in disadvantaged communities. We
                        provide tuition (including cost of books and other
                        materials) to children in primary and secondary
                        schools.
                    </p>
                    <div class="">
                        <a href="/inspire-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Lifelong Development
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        The Special Foundation facilitates continuous
                        development of the children we support through a
                        lifelong program. The program includes mentorship
                        and leadership training.
                    </p>
                    <div class="">
                        <a href="/life-long-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Mentorship/Career Day Program
                    </h1>
                    <p class="montserrat-medium text-xs pb-12">
                        This is a merit-based program that focuses on
                        identifying young talents through a rigorous
                        selection process and linking them with
                        opportunities or platforms that will allow them best
                        fulfill their potential.
                    </p>
                    <div class="">
                        <a href="/mentorship-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        School <br />
                        Build
                    </h1>
                    <p class="montserrat-medium text-xs pb-12">
                        The Special Foundation seeks to build schools to
                        make sure more children have access to a safe and
                        quality learning environment. We believe this is
                        critical to ensuring more children gain access to
                        quality education.
                    </p>
                    <div class="">
                        <a href="/school-build"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Special <br />
                        Scholarship
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        Special Scholarship is merit based and targeted at
                        identifying gifted students for local tertiary
                        institutions. This scholarship is available to
                        students under the age of 21 and covers tuition.
                    </p>
                    <div class="">
                        <a href="/special-scholarship-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Summer <br />
                        School
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        This is a 4-6 weeks summer school program for less privileged children in Nigeria. The program is a
                        free program that selects over a thousand annually...
                    </p>
                    <div class="">
                        <a href="/summer-school-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
        </swiper-container>

        <swiper-container slides-per-view="4" speed="500" loop="true" autoplay="true" css-mode="true"
            class="swiper-container-second hidden lg:flex flex-row gap-12 pb-16 mx-8">
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Inspire Scholarship
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        This scholarship is targeted at orphaned and
                        vulnerable children in disadvantaged communities. We
                        provide tuition (including cost of books and other
                        materials) to children in primary and secondary
                        schools.
                    </p>
                    <div class="">
                        <a href="/inspire-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Lifelong Development
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        The Special Foundation facilitates continuous
                        development of the children we support through a
                        lifelong program. The program includes mentorship
                        and leadership training.
                    </p>
                    <div class="">
                        <a href="/life-long-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Mentorship/Career Day Program
                    </h1>
                    <p class="montserrat-medium text-xs pb-12">
                        This is a merit-based program that focuses on
                        identifying young talents through a rigorous
                        selection process and linking them with
                        opportunities or platforms that will allow them best
                        fulfill their potential.
                    </p>
                    <div class="">
                        <a href="/mentorship-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        School <br />
                        Build
                    </h1>
                    <p class="montserrat-medium text-xs pb-12">
                        The Special Foundation seeks to build schools to
                        make sure more children have access to a safe and
                        quality learning environment. We believe this is
                        critical to ensuring more children gain access to
                        quality education.
                    </p>
                    <div class="">
                        <a href="/school-build"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Special <br />
                        Scholarship
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        Special Scholarship is merit based and targeted at
                        identifying gifted students for local tertiary
                        institutions. This scholarship is available to
                        students under the age of 21 and covers tuition.
                    </p>
                    <div class="">
                        <a href="/special-scholarship-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="">
                <div class="bg-white py-10 px-10 rounded-3xl w-72 h-80">
                    <h1 class="text-[#25A8D6] leading-[22px] pb-4 text-xl montserrat-bold">
                        Summer <br />
                        School
                    </h1>
                    <p class="montserrat-medium text-xs pb-16">
                        This is a 4-6 weeks summer school program for less privileged children in Nigeria. The program is a
                        free program that selects over a thousand annually...
                    </p>
                    <div class="">
                        <a href="/summer-school-program"
                            class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
                            MORE</a>
                    </div>
                </div>
            </swiper-slide>
        </swiper-container>
    </div>
    {{-- OUR PROGRAMS END --}}

    {{-- SUPPORT START --}}
    <div class="bg-white mx-5 lg:mx-20 py-20">
        <div class="flex flex-col lg:flex-row gap-28">
            <div class="montserrat-light font-normal text-sm 2xl:text-base basis-3/5">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-6">
                    Supporting the UN’s SD Goals
                </h1>
                <div class="">
                    <p class="border-[#25A8D6] pl-5 border-l-[14px]">
                        Africa has the youngest population in the world, with 70% of sub-Saharan Africa under the age of
                        30. Such a high number of young people is an opportunity for the continent’s growth – but only
                        if these new generations are fully empowered to realize their best potential. It is especially
                        important that young people are included in decision making and given appropriate opportunities
                        for work and to innovate. The Special Foundation’s programs provide the youths lifelong skills
                        that empowers them to realize their potentials.
                        <br />
                        <br />
                        The Special Foundation is committed to helping the United Nations achieve its Sustainable
                        Development Goals (SDGs) by tailoring our programs to promote and contribute towards its goals
                        and helping to build a sustainable future for all.
                        <br />
                        <br />
                        Here are some of the goals we are focused on:
                    </p>
                </div>
            </div>
            <div class="basis-2/5">
                <div class="w-96 grid grid-cols-4 gap-2 items-center justify-center">
                    <div onclick="showSdgModal(1)">
                        <img class="" src="/images/sdg-1.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(2)">
                        <img class="" src="/images/sdg-2.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(3)">
                        <img class="" src="/images/sdg-4.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(4)">
                        <img class="" src="/images/sdg-5.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(5)">
                        <img class="" src="/images/sdg-8.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(6)">
                        <img class="" src="/images/sdg-9.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(7)">
                        <img class="" src="/images/sdg-11.png" alt="" />
                    </div>
                    <div onclick="showSdgModal(8)">
                        <img class="" src="/images/sdg-13.png" alt="" />
                    </div>
                </div>
                <div onclick="showSdgModal(9)" class="w-96 flex items-center justify-center mt-2">
                    <img class="" src="/images/sdg-16.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    {{-- SUPPORT END --}}

    {{-- OUR PARTNERS START --}}
    <div class="bg-white mx-5 lg:mx-20">
        <div>
            <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-10">
                Our Select Partners
            </h1>
        </div>
        <div>
            <swiper-container slides-per-view="2" speed="500" loop="true" autoplay="true" css-mode="true"
                class="swiper-container-second flex lg:hidden flex-row gap-12 pb-24">
                @foreach ($partners as $partner)
                    <swiper-slide class="pl-8 self-center">
                        <img src="{{ Storage::url($partner->value) }}" alt="" />
                    </swiper-slide>
                @endforeach


            </swiper-container>

            <swiper-container slides-per-view="3" speed="500" loop="true" autoplay="true" css-mode="true"
                class="swiper-container-second hidden lg:flex xl:hidden flex-row gap-10 pb-24">
                @foreach ($partners as $partner)
                    <swiper-slide class="pl-8 self-center">
                        <img src="{{ Storage::url($partner->value) }}" alt="" />
                    </swiper-slide>
                @endforeach
            </swiper-container>

            <swiper-container slides-per-view="5" speed="500" loop="true" autoplay="true" css-mode="true"
                class="swiper-container-second hidden xl:flex items-center justify-center flex-row gap-8 pb-24">
                @foreach ($partners as $partner)
                    <swiper-slide class="pl-8 self-center">
                        <img src="{{ Storage::url($partner->value) }}" alt="" />
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>
    </div>
    {{-- OUR PARTNERS END --}}

    {{-- NEWSLETTER START --}}
    <div class="bg-[#26225F]">
        <div class="relative text-white py-20 mx-5 lg:mx-20 flex flex-row gap-8 lg:gap-20">
            <div class="w-full basis-full lg:basis-3/5">
                <div class="pb-12">
                    <h1 class="montserrat-bold text-[#25A8D6] text-[28px] md:text-[38px] leading-[45px] pb-5">
                        Subscribe to our Newsletter
                    </h1>
                    <p class="montserrat-medium text-xs">
                        To receive regular updates of the Special
                        Foundation’s work, subscribe below
                    </p>
                </div>

                <div class="flex items-center w-full">
                    <form id="newsletterForm" action="/newsletters" method="POST"
                        class="flex flex-col gap-4 w-full">
                        @csrf
                        <div>
                            <input
                                class="bg-white/70 w-full text-black bg-white-70 placeholder:text-slate-600 placeholder:text-xs placeholder:poppins px-6 lg:ps-12 py-3 lg:py-4 rounded-full border border-1 border-[#25A8D6]"
                                type="text" name="name" placeholder="Full Name" required />
                        </div>
                        <div>
                            <input
                                class="bg-white/70 w-full text-black bg-white-70 placeholder:text-slate-600 placeholder:text-xs placeholder:poppins px-6 lg:ps-12 py-3 lg:py-4 rounded-full border border-1 border-[#25A8D6]"
                                type="text" name="email" placeholder="Your Email" required />
                        </div>
                        {{-- Math CAPTCHA --}}
                        <div id="captchaQuestion" class="mt-2 font-bold"></div>
                        <input type="text" id="captchaAnswer" placeholder="Your Answer" required
                            class="mt-2 bg-white/70 w-full text-black placeholder:text-slate-600 placeholder:text-xs px-6 py-3 rounded-full border border-1 border-[#25A8D6]" />
                        <div class="pt-12 lg:pt-14">
                            <button type="submit"
                                class="text-center rounded-full w-full py-3 text-white bg-[#25A8D6]">
                                SUBSCRIBE
                            </button>
                        </div>
                    </form>

                    <img class="block lg:hidden w-36" src="/images/mail.png" alt="" />
                </div>
            </div>

            <img class="hidden lg:block lg:absolute -mt-40 -mr-20 right-0 top-0 basis-2/5 z-10 xl:w-[750px] lg:w-[600px]"
                src="/images/email-symbol.png" alt="" />
        </div>
    </div>
    {{-- NEWSLETTER END --}}

    {{-- BLOG START --}}
    <div class="bg-white mx-5 lg:mx-20 py-20">
        <div class="">
            <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-8">
                Featured Blogs
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10 md:gap-2 lg:gap-10 text-white">
            @foreach ($featured_posts as $featured_blog)
                <div onclick="navigateTo('/blog/{{ $featured_blog->slug }}')" class="flex flex-col w-[380px]">
                    <div>
                        <img class="w-[380px] cursor-pointer"
                            src="{{ Storage::url($featured_blog->featured_image) }}"
                            alt="{{ $featured_blog->title }}" />
                    </div>
                    <div class="bg-[#26225F] px-12 pt-8 pb-5 cursor-pointer">
                        <h1 class="pb-4 leading-[20px] montserrat-semibold">
                            {{ $featured_blog->title }}
                        </h1>
                        <p class="montserrat-light text-xs pb-4">
                            {{ \Carbon\Carbon::parse($featured_blog->created_at)->format('F d, Y') }}
                        </p>
                        <a class="text-[#25A8D6] text-[8px]" href="/blog/{{ $featured_blog->id }}">READ MORE</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- BLOG END --}}

    {{-- AMBASSADORS MODAL START --}}
    <div id="sdg-modal"
        class="fixed inset-0 bg-black/80 bg-opacity-75 flex items-start justify-center lg:p-20 px-8 py-10 overflow-y-scroll hidden z-50">

    </div>
    {{-- AMBASSADORS MODAL END --}}

    <script>
        //show modal on click
        const sdgs = @json($sdgs);

        function showSdgModal(id) {
            const sdg = sdgs[id - 1];

            const content =
                `<div class="flex flex-col lg:flex-row 2xl:w-[60%] items-start justify-center bg-white rounded-3xl p-10 lg:px-20 lg:py-14 gap-12">
                    <img src="${sdg.image}" alt="${sdg.title}">
                    <div class="flex flex-col items-start gap-8">
                        <div>
                            <h3 class="montserrat-bold text-[#25A8D6] text-2xl">${sdg.title}</h3>
                            <h3 class="montserrat-light font-semibold text-black text-xl">${sdg.subtitle}</h3>
                        </div>
                        <p class="montserrat-light font-normal">
                            ${sdg.description}
                        </p>
                    </div>
                </div>`;

            let modal = document.getElementById("sdg-modal");
            modal.innerHTML = content;
            modal.classList.toggle('hidden');

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }

        function navigateTo(url) {
            window.location.href = url;
        }

        // Generate a simple math question
        function generateCaptcha() {
            const num1 = Math.floor(Math.random() * 10);
            const num2 = Math.floor(Math.random() * 10);
            const noise = Math.random() < 0.5 ? '?' : '!'; // Random noise character
            const question = `What is ${num1} + ${num2}${noise}`; // Add noise to the question
            document.getElementById('captchaQuestion').innerText = question;
            return num1 + num2; // Return the correct answer
        }

        let correctAnswer = generateCaptcha();

        document.getElementById('newsletterForm').addEventListener('submit', function(event) {
            const userAnswer = parseInt(document.getElementById('captchaAnswer').value);
            if (userAnswer !== correctAnswer) {
                event.preventDefault(); // Prevent form submission
                alert('Incorrect answer. Please try again.');
                correctAnswer = generateCaptcha(); // Regenerate question
            }
        });
    </script>
</x-guest-layout>
