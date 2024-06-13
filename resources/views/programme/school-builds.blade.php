<x-guest-layout title="Programs - School Builds" page="programs">
    <div class="relative bg-cover bg-center h-40"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full bg-[#26225F]/75">
            <div class="h-full flex flex-row justify-center items-center text-[35px] poppins-semibold text-[#25A8D6]">
                School Builds
            </div>
        </div>
    </div>

    <div class="w-full p-20 flex flex-col gap-16">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 space-y-12">
                <p class="text-lg poppins-light">
                    At the end of the program, the participants are
                    equipped with various skill sets such as mental
                    mathematics, creative writing, ICT, public speaking,
                    and craftsmanship. Through this program, students
                    have a better chance of reaching their best
                    potential.
                </p>
                <div class="py-4 px-14 bg-[#26225F] text-white poppins-thin w-fit">
                    <p>“School is a building which has four walls with
                        tomorrow inside.” - Lon Watters</p>
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/school_build_1.png" alt="">
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/school_build_2.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/school_build_3.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/school_build_4.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/school_build_5.png" alt="">
            </div>
        </div>
    </div>

    <x-beneficiary-form programme="3" />
</x-guest-layout>
