<x-guest-layout title="Special Foundation - Home" page="home">
    <div class="max-h-[100vh] max-w-[100vw]">
        <swiper-container slides-per-view="1" speed="900" loop="true" autoPlay="true" css-mode="true"
            class="flex max-w-[100vw] justify-between items-center">
            <swiper-slide class=""><img src="/images/carousel-1.png" alt=""
                    class="w-[100vw]" /></swiper-slide>
            <swiper-slide class=""><img src="/images/carousel-2.png" alt=""
                    class="w-[100vw]" /></swiper-slide>
            <swiper-slide class=""><img src="/images/carousel-3.png" alt=""
                    class="w-[100vw]" /></swiper-slide>
        </swiper-container>
    </div>
    <div class="mx-5 lg:mx-20 py-20 flex flex-col lg:flex-row gap-20">
        <div class="basis-4/5 flex flex-col gap-16">
            <div class="flex flex-col lg:flex-row gap-10">
                <div class="montserrat-medium text-xs basis-3/5">
                    <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-6">
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
                    <img class="w-full h-[278px]" src="/images/home_1.png" alt="" />
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
        <div class="montserrat-medium text-xs basis-1/5">
            <div class="pb-10">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3">
                    21,000+
                </h1>
                <p class="">
                    Nigerian children directly and indirectly impacted by
                    the foundation over the last 5 years
                </p>
            </div>
            <div class="pb-10">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3">
                    460+
                </h1>
                <p class="">
                    Nigerian children are given access to education through
                    the Inspire Scholarship Pprogram yearly
                </p>
            </div>
            <div class="pb-10">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3">
                    10,672+
                </h1>
                <p class="">
                    Nigerian children access educational and vocational
                    training through the free Summer School Program yearly
                </p>
            </div>
            <div class="pb-10">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3">
                    6,879+
                </h1>
                <p class="">
                    Nigerian children accessing mentorship through our
                    Mentorship/Career Day Program
                </p>
            </div>
            <div class="pb-10">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-3">
                    5+
                </h1>
                <p class="">
                    Nigerian Schools accessing conducive learning
                    environment through our school build project
                </p>
            </div>
        </div>
    </div>

    {{-- OUR PROGRAMS START --}}
    <div class="bg-[#26225F]">
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
                        Builds
                    </h1>
                    <p class="montserrat-medium text-xs pb-12">
                        The Special Foundation seeks to build schools to
                        make sure more children have access to a safe and
                        quality learning environment. We believe this is
                        critical to ensuring more children gain access to
                        quality education.
                    </p>
                    <div class="">
                        <a href="/school-build" class="text-white text-base bg-[#25A8D6] px-10 py-3 rounded-full">LEARN
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
                        This is a 3-week summer school program for less privileged children in Nigeria. The program is a
                        free program that selects over a thousand annually to embark on a transformational intellectual
                        experience that challenges them on who they are and the need for Nation building.
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
                        Builds
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
                        This is a 3-week summer school program for less privileged children in Nigeria. The program is a
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
            <div class="montserrat-medium text-xs basis-3/5">
                <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-6">
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
                    <img class="w-[90px] -ml-12" src="/images/sdg-16.png" alt="" />
                </div>
            </div>
        </div>
    </div>
    {{-- SUPPORT END --}}

    {{-- OUR PARTNERS START --}}
    <div class="bg-white mx-5 lg:mx-20">
        <div>
            <h1 class="montserrat-bold text-[#26225F] text-[38px] leading-[45px] pb-10">
                Our Partners
            </h1>
        </div>
        <div>
            <swiper-container slides-per-view="2" speed="500" loop="true" autoplay="true" css-mode="true"
                class="swiper-container-second flex lg:hidden flex-row gap-12 pb-24">
                <swiper-slide class="">
                    <img src="/images/microsoft_home.png" alt="" />
                </swiper-slide>
                <swiper-slide class="pl-16">
                    <img src="/images/2-google-logo.png" alt="" />
                </swiper-slide>
                <swiper-slide class="pl-16">
                    <img src="/images/3-logo.png" alt="" />
                </swiper-slide>
                <swiper-slide class="">
                    <img src="/images/4-firstep_lg.png" alt="" />
                </swiper-slide>
                <swiper-slide class="pl-16">
                    <img src="/images/garda_home.png" alt="" />
                </swiper-slide>
                <swiper-slide class="pl-16">
                    <img src="/images/graychapel_home.png" alt="" />
                </swiper-slide>
                <swiper-slide class="pl-16">
                    <img src="/images/rif_trust_home.png" alt="" />
                </swiper-slide>
            </swiper-container>

            <swiper-container slides-per-view="4" speed="500" loop="true" autoplay="true" css-mode="true"
                class="swiper-container-second hidden lg:flex flex-row gap-12 pb-24">
                <swiper-slide class="">
                    <img src="/images/microsoft_home.png" alt="" />
                </swiper-slide>

                <swiper-slide class="pl-16">
                    <img src="/images/2-google-logo.png" alt="" />
                </swiper-slide>

                <swiper-slide class="pl-16">
                    <img src="/images/3-logo.png" alt="" />
                </swiper-slide>

                <swiper-slide class="">
                    <img src="/images/4-firstep_lg.png" alt="" />
                </swiper-slide>

                <swiper-slide class="pl-16">
                    <img src="/images/garda_home.png" alt="" />
                </swiper-slide>

                <swiper-slide class="pl-16">
                    <img src="/images/graychapel_home.png" alt="" />
                </swiper-slide>

                <swiper-slide class="pl-16">
                    <img src="/images/rif_trust_home.png" alt="" />
                </swiper-slide>
            </swiper-container>
        </div>
    </div>
    {{-- OUR PARTNERS END --}}

    {{-- NEWSLETTER START --}}
    <div class="bg-[#26225F]">
        <div class="relative text-white py-20 mx-5 lg:mx-20 flex flex-row gap-8 lg:gap-20">
            <div class="w-full basis-full lg:basis-3/5">
                <div class="pb-12">
                    <h1 class="montserrat-bold text-[#25A8D6] text-[14px] md::text-[38px] leading-[45px] pb-5">
                        Subscribe to our Newsletter
                    </h1>
                    <p class="montserrat-medium text-xs">
                        To receive regular updates of the Special
                        Foundation’s work, subscribe below
                    </p>
                </div>

                <div class="flex items-center w-full">
                    <form action="/newsletters" method="POST" class="flex flex-col gap-4 w-full">
                        @csrf
                        <div>
                            <input
                                class="w-full text-black bg-white-70 placeholder:text-slate-600 placeholder:text-xs placeholder:poppins px-6 lg:ps-12 py-3 lg:py-4 rounded-full border border-1 border-[#25A8D6]"
                                type="text" name="name" placeholder="Full Name" required />
                        </div>
                        <div>
                            <input
                                class="w-full text-black bg-white-70 placeholder:text-slate-600 placeholder:text-xs placeholder:poppins px-6 lg:ps-12 py-3 lg:py-4 rounded-full border border-1 border-[#25A8D6]"
                                type="text" name="email" placeholder="Your Email" required />
                        </div>
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

            <img class="hidden lg:block lg:absolute -mt-40 -mr-20 right-0 top-0 basis-2/5 z-20 xl:w-[750px] lg:w-[600px]"
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
        <div class="flex flex-col md:flex-row no-wrap md:flex-wrap gap-10 md:gap-2 lg:gap-10 text-white">
            @foreach ($featured_posts as $featured_blog)
                <div class="flex flex-col w-[380px]">
                    <div>
                        <img class="w-[380px]" src="{{ Storage::url($featured_blog->featured_image) }}"
                            alt="{{ $featured_blog->title }}" />
                    </div>
                    <div class="bg-[#26225F] px-12 pt-8 pb-5">
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

</x-guest-layout>
