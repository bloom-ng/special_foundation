<x-guest-layout title="Programs - Special Summer School" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div class="h-full flex flex-row justify-center items-center text-[35px] montserrat-semibold text-[#25A8D6]">
                Special Summer School
            </div>
        </div>
    </div>

    <div class="w-full px-8 py-20 lg:px-20 flex flex-col gap-16">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/summer_1.png" alt="">
            </div>
            <div class="w-full lg:w-1/2 space-y-12 bg-[#25A8D6] p-12 text-white">
                <p class="text-sm lg:text-lg montserrat-thin">
                    This is a 3-week summer school program for less privileged children in  Nigeria. The program is a
                    free program that selects over a thousand annually to embark on a transformational intellectual
                    experience that challenges them on who they are and the need for Nation building.


                </p>
                <p class="text-sm lg:text-lg montserrat-thin">
                    Children are trained on key skills such as mental mathematics, critical thinking, creative writing
                    and public speaking. Patriotism and National values are also ignited in the children.
                </p>
                <p class="text-sm lg:text-lg montserrat-thin">
                    In addition to the learnings provided, pupils are given writing materials and refreshments daily.
                </p>

            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/summer_2.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/summer_3.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/summer_4.png" alt="">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/summer_5.png" alt="">
            </div>
        </div>
    </div>

    <x-beneficiary-form programme="4" />
</x-guest-layout>
