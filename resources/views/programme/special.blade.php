<x-guest-layout title="Programs - Special Scholarship" page="programs">
    <div class="relative bg-cover bg-center h-40"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full bg-[#26225F]/75">
            <div class="h-full flex flex-row justify-center items-center text-[35px] poppins-semibold text-[#25A8D6]">
                Special Scholarship
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col p-20 gap-14">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2">
                <p class="text-lg poppins-light mb-4">
                    Special Scholarship is merit based and targeted at
                    identifying gifted students for local tertiary
                    institutions. This scholarship is available to
                    students under the age of 21 and covers tuition
                    (including books and other materials).
                </p>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/special_1.png" alt="">
            </div>
        </div>

        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/special_2.png" alt="">
            </div>
            <div class="w-full lg:w-1/2 bg-[#25A8D6] p-14 h-auto lg:h-[456px]">
                <h1 class="text-[#26225F] lg:text-2xl mb-3 poppins-bold">
                    Who Qualifies For The Scholarship?
                </h1>
                <p class="lg:text-lg poppins-thin lg:leading-[24px] text-white mb-3">
                    Applicants must;
                </p>
                <div class="ml-6 my-4">
                    <ul class="lg:text-lg poppins-thin list-disc lg:leading-[24px] text-white">
                        <li class="pb-4">
                            Have completed their secondary school
                            education with exceptional grades.
                        </li>
                        <li class="pb-4">
                            Demonstrate leadership potential through
                            leadership positions held in secondary
                            school.
                        </li>
                        <li class="pb-4">
                            Be involved in extra-curricular activities.
                        </li>
                        <li class="pb-4">
                            Write an essay on a topic selected by the
                            Foundation at the time of application.
                        </li>
                        <li class="">
                            Be recommended by their secondary school
                            authority.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col gap-8">
            <h3 class="text-[#26225F] poppins-medium leading-7 text-[24px]">Documents Required</h3>
            <div class="flex flex-wrap gap-8">
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">1</span> The applicants
                    birth
                    certificate
                </div>
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">2</span>Reference from
                    school authorities
                </div>
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">3</span> Recognized public
                    school leaving examination
                    results from their country of origin
                </div>
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">4</span> Character
                    reference
                </div>
            </div>
        </div>

        <p class="poppins-thin"><span class="poppins-medium text-[#26225F]">*Note:</span> the results of the sponsored
            child must be
            submitted to the Foundation at the end of each semester</p>

        <div class="p-4 bg-[#26225F] text-white poppins-thin w-fit">
            <p>“An investment in knowledge pays the best dividends.” - Victor Hugo</p>
        </div>
    </div>

    <x-beneficiary-form programme="2" />
</x-guest-layout>
