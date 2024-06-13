<x-guest-layout title="Programs - Inspire Scholarship" page="programs">
    <div class="relative bg-cover bg-center h-40"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full bg-[#26225F]/75">
            <div class="h-full flex flex-row justify-center items-center text-[35px] poppins-semibold text-[#25A8D6]">
                The Inspire Scholarship
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col p-20 gap-14">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2">
                <p class="text-lg poppins-light mb-4">
                    The Inspire Scholarship Program is designed to
                    provide scholarships for children of low-income
                    earners, orphaned children, and families that have
                    lost a breadwinner. This initiative focuses on
                    primary and secondary school students. The
                    scholarship funds are paid directly to the schools
                    to cover the following items for each child per
                    session:
                </p>
                <div class="ml-6 mb-4">
                    <ul class="text-lg  poppins-light list-disc leading-[17px] space-y-2">
                        <li>Tuition</li>
                        <li>UniformCosts</li>
                        <li>Books</li>
                        <li>Stationery</li>
                        <li>Lunch</li>
                    </ul>
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/inspire_1.png" alt="">
            </div>
        </div>

        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/inspire_2.png" alt="">
            </div>
            <div class="w-full lg:w-1/2 bg-[#25A8D6] p-14 h-auto lg:h-[456px]">
                <h1 class="text-[#26225F] lg:text-2xl pb-3 poppins-bold">
                    Who Qualifies For The Scholarship?
                </h1>
                <div class="ml-6 my-4">
                    <ul class="lg:text-lg poppins-thin list-disc lg:leading-[24px] text-white">
                        <li class="pb-4">
                            The applicants must be orphaned (lost one or
                            both parents) and or a disadvantaged child
                            with both parents who are unable to fend for
                            the child.
                        </li>
                        <li class="pb-4">
                            All applicants must be less than 18 years.
                        </li>
                        <li class="pb-4">
                            Scholarships are restricted to day and
                            boarding Government, Private or mission
                            schools in Africa.
                        </li>
                        <li class="">
                            The Scholarship will not sponsor children
                            outside of their country of residence at
                            this time. The scholarship is valid until
                            the student completes their secondary
                            education.
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
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">2</span> Letter from the
                    school confirming
                    enrolment
                </div>
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">3</span> Most recent
                    results
                    from the school
                </div>
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">4</span> Death certificate
                    or
                    a letter from
                    local authority confirming death of one parent
                </div>
                <div
                    class="flex rounded-full text-white poppins-thin py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 poppins-medium">5</span> Demonstration of
                    lack
                    of capacity by
                    the parents
                </div>
            </div>
        </div>

        <p class="poppins-thin"><span class="poppins-medium text-[#26225F]">*Note:</span> the results of the sponsored
            child must be
            submitted to the Foundation at the end of each term</p>

        <div class="p-4 bg-[#26225F] text-white poppins-thin w-fit">
            <p>“He who opens a school door, closes a prison” -
                Victor Hugo</p>
        </div>
    </div>

    <x-beneficiary-form programme="1" />
</x-guest-layout>
