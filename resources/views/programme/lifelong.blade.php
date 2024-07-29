<x-guest-layout title="Programs - Lifelong Development" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Lifelong Development
            </div>
        </div>
    </div>


    <div
        class="w-full py-20 px-8 lg:px-20 sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
        <div class="w-full lg:w-1/2 space-y-8">
            <p class="text-lg montserrat-light font-normal">
                The Special Foundation facilitates continuous development of the children we support through a lifelong
                program. The program includes mentorship and leadership training through practical platforms such as
                community involvement, leadership training, mentoring through internships and a lifelong development
                through an alumni network.
            </p>
            <div class="p-4 bg-[#26225F] text-white montserrat-thin font-normal w-full">
                <p>“Children must be taught how to think, not what to think.” - Margaret Mead</p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 rounded-2xl">
            <img src="/images/lifelong.png" alt="">
        </div>
    </div>

    <x-beneficiary-form programme="5" />
</x-guest-layout>
