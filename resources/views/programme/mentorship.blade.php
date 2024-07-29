<x-guest-layout title="Programs - Mentorship/Career Day Program" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Mentorship/Career Day Program
            </div>
        </div>
    </div>

    <div class="w-full py-20 px-8 lg:px-20 flex flex-col gap-16">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 space-y-12">
                <p class="text-lg montserrat-light font-normal">
                    Our Mentorship/Career Day program is a program where professionals from different fields talk to
                    school students about their careers. The Professionals share the realities of working in
                    different industries and jobs with the children as well as life skills, guidance on how to make
                    career choices, tips on how to excel in the workplace, personal success stories and career
                    opportunities.
                </p>
                <div class="py-4 px-14 bg-[#26225F] text-white montserrat-thin font-normal w-fit">
                    <p>“I am not a teacher, but an awakener.” - Robert Frost</p>
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/mentorship_1.png" alt="">
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_2.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_3.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_4.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_5.png" alt="">
            </div>
        </div>
    </div>

    <x-beneficiary-form programme="3" />
</x-guest-layout>
