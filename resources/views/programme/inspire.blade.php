<x-guest-layout title="Programs - Inspire Scholarship" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                The Inspire Scholarship
            </div>
        </div>
    </div>

    <div class="w-full flex flex-col py-20 px-8 lg:px-20 gap-14">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-start space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2">
                <p class="text-lg montserrat-light font-normal mb-4">
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
                    <ul class="text-lg  montserrat-light font-normal list-disc leading-[17px] space-y-2">
                        <li>Tuition</li>
                        <li>Uniform</li>
                        <li>Books</li>
                        <li>Stationery</li>
                        <li>Lunch</li>
                    </ul>
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/inspire_1.png" alt="Inspire Scholarship Beneficiary">
            </div>
        </div>

        <div class="w-full sm:flex lg:flex-row sm:flex-col items-start space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 rounded-2xl">
                <img src="/images/inspire_2.png" alt="Inspire Scholarship Beneficiary">
            </div>
            <div class="w-full lg:w-1/2 bg-[#25A8D6] p-14 h-auto lg:h-[456px]">
                <h1 class="text-[#26225F] lg:text-2xl pb-3 montserrat-bold">
                    Who Qualifies For The Scholarship?
                </h1>
                <div class="ml-6 my-4">
                    <ul class="lg:text-lg montserrat-thin font-normal list-disc lg:leading-[24px] text-white">
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
            <h3 class="text-[#26225F] montserrat-medium leading-7 text-[24px]">Documents Required</h3>
            <div class="flex flex-wrap gap-8">
                <div
                    class="flex rounded-full text-white montserrat-thin font-normal py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 montserrat-medium">1</span> The applicants
                    birth
                    certificate
                </div>
                <div
                    class="flex rounded-full text-white montserrat-thin font-normal py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 montserrat-medium">2</span> Letter from
                    the
                    school confirming
                    enrolment
                </div>
                <div
                    class="flex rounded-full text-white montserrat-thin font-normal py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 montserrat-medium">3</span> Most recent
                    results
                    from the school
                </div>
                <div
                    class="flex rounded-full text-white montserrat-thin font-normal py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 montserrat-medium">4</span> Death
                    certificate
                    or
                    a letter from
                    local authority confirming death of one parent
                </div>
                <div
                    class="flex rounded-full text-white montserrat-thin font-normal py-2 pl-2 pr-6 bg-[#25A8D6] items-center w-fit gap-4">
                    <span class="bg-white text-black rounded-[100%] py-1 px-3 montserrat-medium">5</span> Demonstration
                    of
                    lack
                    of capacity by
                    the parents
                </div>
            </div>
        </div>

        <p class="montserrat-thin font-semibold"><span
                class="montserrat-medium font-semibold text-[#26225F]">*Note:</span> the
            results of the
            sponsored
            child must be
            submitted to the Foundation at the end of each term</p>

        <div class="p-4 bg-[#26225F] text-white montserrat-thin font-normal w-fit">
            <p>“He who opens a school door, closes a prison” -
                Victor Hugo</p>
        </div>
    </div>

    <x-beneficiary-form programme="1" />
</x-guest-layout>
