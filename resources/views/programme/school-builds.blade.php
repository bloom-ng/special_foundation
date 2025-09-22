<x-guest-layout title="Programs - School Build" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                School Build
            </div>
        </div>
    </div>

    <div class="w-full py-20 px-8 lg:px-20 flex flex-col gap-16">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-start space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 space-y-12">
                <p class="text-lg montserrat-light font-normal">
                    A lot of public schools in Africa lack basic infrastructure. The Special Foundation seeks to build
                    schools to make sure more children have access to a safe and quality learning environment. We
                    believe this is critical to ensuring more children gain access to quality education.<br>
                    We work with the relevant education ministries and local governments to identify communities that
                    require good and safe learning infrastructures and then build or renovate a school in that
                    location.<br>
                    Our programs ensure the provision of classroom furniture (desks, chairs and more) and school
                    infrastructure including formal walls, windows, and doors to enhance ventilation and lighting.<br>
                    We employ the use of local contractors, building materials and techniques to support local economies
                </p>
                <div class="py-4 px-14 bg-[#26225F] text-white montserrat-thin font-normal w-fit">
                    <p>“School is a building which has four walls with
                        tomorrow inside.” - Lon Watters</p>
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                {{-- <img src="/images/school_build_1.png" alt=""> --}}
                <iframe class="w-full h-[315px]" src="https://www.youtube.com/embed/AFecLWwg5tc?si=glsyG9btuLHvsWgG"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_1.png" alt="A Brightly Decorated Classroom for the Students" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_6.png" alt="Smiling Children in the Classroom" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_7.png" alt="" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_5.png" alt="An Aerial View of the School Compound" loading="lazy" class="rounded-3xl">
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_2.png" alt="A Clear View of the Before and After of the School Playground" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_3.png" alt="A Clear View of the Before and After of the School Classrooms" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_4.png" alt="A Side View of the Long School Blocks With Classrooms" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_8.png" alt="Students Learning in the Classroom" loading="lazy" class="rounded-3xl h-full">
            </div>
        </div>
    </div>

    <x-beneficiary-form programme="3" />
</x-guest-layout>
