<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Include Tailwind CSS -->
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="{{ asset('css/font.css') }}" />

        <!-- Include Poppins Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
        <!-- Include Mont Font -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        /> -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    </head>

    <body>
        <div
            class="bg-white text-lg text-black flex flex-row justify-between gap-12 my-6 mx-20"
        >
            <div class="flex flex-row gap-6 justify-center items-center">
                <a href="">
                    <img
                        class="w-10"
                        src="/images/the-special-youth-leadership-foundation-03.png"
                        alt=""
                    />
                </a>
                <a href="">
                    <img
                        class="w-36 h-5"
                        src="/images/the-special-youth-leadership-foundation-02.png"
                        alt=""
                    />
                </a>
            </div>
            <div
                class="flex justify-between justify-center items-center gap-16 text-base poppins-medium"
            >
                <a href="#" class="">HOME</a>
                <div
                    class="flex text-[#25A8D6] gap-2 items-center justify-center"
                >
                    <a href="#" class="poppins-bold">PROGRAMS</a>
                    <img
                        class="pt-1"
                        src="/images/collapse-arrow.svg"
                        alt="Collapse Arrow"
                    />
                </div>
                <a href="#">WHO WE ARE</a>
                <a href="#">BLOG</a>
                <a href="#">GET INVOLVED</a>
                <a
                    href="#"
                    class="text-white bg-[#25A8D6] px-10 py-2 -mt-2 rounded-full"
                    >DONATE</a
                >
            </div>
        </div>
        <div
            class="relative bg-cover bg-center h-40"
            style="background-image: url('/images/rectangle-background.png')"
        >
            <div class="absolute z-10 inset-0 bg-[#26225F] bg-opacity-75">
                <div
                    class="mt-14 flex flex-row justify-center text-[35px] poppins-semibold text-[#25A8D6]"
                >
                    Our Programs
                </div>
            </div>
        </div>
        <div>
            <div class="mx-20 py-20 flex flex-row gap-12">
                <div class="basis-3/7">
                    <div class="pb-8">
                        <h1
                            class="text-[#25A8D6] -mt-1 text-[36px] pb-3 poppins-bold"
                        >
                            The Inspire Scholarship
                        </h1>
                        <p class="text-xs poppins-medium pb-4">
                            The Inspire Scholarship Program is designed to
                            provide scholarships for children of low-income
                            earners, orphaned children, and families that have
                            lost a breadwinner. This initiative focuses on
                            primary and secondary school students. The
                            scholarship funds are paid directly to the schools
                            to cover the following items for each child per
                            session:
                        </p>
                        <div class="ml-6 pb-4">
                            <ul
                                class="text-xs poppins-medium list-disc leading-[17px]"
                            >
                                <li>Tuition</li>
                                <li>UniformCosts</li>
                                <li>Books</li>
                                <li>Stationery</li>
                                <li>Lunch</li>
                            </ul>
                        </div>
                        <p class="text-xs poppins-medium">
                            “He who opens a school door, closes a prison” -
                            Victor Hugo
                        </p>
                    </div>
                    <div class="pb-8">
                        <h1 class="text-[#26225F] text-lg pb-3 poppins-bold">
                            Who Qualifies For The Scholarship?
                        </h1>
                        <div class="ml-6 pb-4">
                            <ul
                                class="text-xs poppins-medium list-disc leading-[17px]"
                            >
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
                    <div class="pb-8">
                        <h1 class="text-[#26225F] text-lg pb-3 poppins-bold">
                            Documents Required
                        </h1>
                        <div class="ml-6 pb-4">
                            <ul
                                class="text-xs poppins-medium list-disc leading-[17px]"
                            >
                                <li>The applicants birth certificate</li>
                                <li>
                                    Letter from the school confirming enrolment
                                </li>
                                <li>Most recent results from the school</li>
                                <li>
                                    Death certificate or a letter from local
                                    authority confirming death of one parent
                                </li>
                                <li>
                                    Demonstration of lack of capacity by the
                                    parents
                                </li>
                            </ul>
                        </div>
                        <p class="text-xs pt-3 poppins-medium">
                            <span
                                class="text-sm text-[#26225F] poppins-semibold"
                                >*Note:</span
                            >
                            the results of the sponsored child must be submitted
                            to the Foundation at the end of each term
                        </p>
                    </div>
                </div>
                <div class="basis-4/7">
                    <img src="/images/boy-writing.png" alt="" />
                </div>
            </div>
        </div>
        <div>
            <div class="mx-20 pb-20 flex flex-row gap-12">
                <div class="basis-4/7">
                    <img src="/images/making-dreams.png" alt="" />
                </div>
                <div class="basis-3/7">
                    <div class="pb-8">
                        <h1
                            class="text-[#25A8D6] text-[36px] pb-3 poppins-bold"
                        >
                            Lifelong Development
                        </h1>
                        <p class="text-xs poppins-medium pb-8">
                            The Special Foundation facilitates continuous
                            development of the children we support through a
                            lifelong program. The program includes mentorship
                            and leadership training through practical platforms
                            such as community involvement, leadership training,
                            mentoring through internships and a lifelong
                            development through an alumni network.
                        </p>
                    </div>
                    <div class="pb-8">
                        <h1
                            class="text-[#25A8D6] text-[36px] leading-[35px] pb-8 poppins-bold"
                        >
                            Mentorship/Career Day Program
                        </h1>
                        <p class="text-xs poppins-medium pb-6">
                            Our Mentorship/Career Day program is a program where
                            professionals in different fields talk to school
                            students about their careers. The Professionals
                            bring the realities of the jobs to the children
                            together with life skills, secrets on how to make
                            career choices, tips on how to excel, personal
                            success stories and career opportunities.
                        </p>
                    </div>
                    <div class="pb-8">
                        <h1
                            class="text-[#25A8D6] text-[36px] pb-3 poppins-bold"
                        >
                            School Builds
                        </h1>
                        <p class="text-xs poppins-medium pb-5">
                            At the end of the program, the participants are
                            equipped with various skill sets such as mental
                            mathematics, creative writing, ICT, public speaking,
                            and craftsmanship. Through this program, students
                            have a better chance of reaching their best
                            potential.
                        </p>
                        <div class="text-xs poppins-medium">
                            “School is a building which has four walls with
                            tomorrow inside.” - Lon Watters
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="mx-20 pb-20 flex flex-row gap-12">
                <div class="basis-3/7">
                    <div class="pb-8">
                        <h1
                            class="text-[#25A8D6] -mt-1 text-[36px] pb-3 poppins-bold"
                        >
                            Special Scholarship
                        </h1>
                        <p class="text-xs poppins-medium pb-4">
                            Special Scholarship is merit based and targeted at
                            identifying gifted students for local tertiary
                            institutions. This scholarship is available to
                            students under the age of 21 and covers tuition
                            (including books and other materials).
                        </p>
                    </div>
                    <div class="pb-8">
                        <h1 class="text-[#26225F] text-lg pb-3 poppins-bold">
                            Who Qualifies For The Scholarship?
                        </h1>
                        <p class="text-xs poppins-medium pb-4">
                            Applicants must;
                        </p>
                        <div class="ml-6 pb-4">
                            <ul
                                class="text-xs poppins-medium list-disc leading-[17px]"
                            >
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
                    <div class="pb-8">
                        <h1 class="text-[#26225F] text-lg pb-3 poppins-bold">
                            Documents Required
                        </h1>
                        <div class="ml-6 pb-4">
                            <ul
                                class="text-xs poppins-medium list-disc leading-[17px]"
                            >
                                <li>The applicants birth certificate</li>
                                <li>Reference from school authorities</li>
                                <li>
                                    Recognized public school leaving examination
                                    results from their country of origin
                                </li>
                                <li>Character reference</li>
                            </ul>
                        </div>
                        <p class="text-xs pt-3 poppins-medium">
                            <span
                                class="text-sm text-[#26225F] poppins-semibold"
                                >*Note:</span
                            >
                            the results of the sponsored child must be submitted
                            to the Foundation at the end of each semester
                        </p>
                    </div>
                </div>
                <div class="basis-4/7">
                    <img src="/images/brown-head-woman.png" alt="" />
                </div>
            </div>
        </div>
        <div>
            <div class="mx-20 pb-20 flex flex-row gap-12">
                <div class="basis-4/7">
                    <img src="/images/teacher-and-kids.png" alt="" />
                </div>
                <div class="basis-3/7">
                    <div class="pb-8">
                        <h1
                            class="text-[#25A8D6] -mt-1 text-[36px] pb-3 poppins-bold"
                        >
                            Special Summer School
                        </h1>
                        <p class="text-xs poppins-medium pb-4">
                            This is a 3-week summer school program for less
                            privileged children in  Nigeria. The program is a
                            free program that selects over a thousand annually
                            to embark on a transformational intellectual
                            experience that challenges them on who they are and
                            the need for Nation building.
                        </p>
                        <p class="text-xs poppins-medium pb-4">
                            Children are trained on key skills such as mental
                            mathematics, critical thinking, creative writing and
                            public speaking. Patriotism and National values are
                            also ignited in the children.
                        </p>
                        <p class="text-xs poppins-medium">
                            In addition to the learnings provided, pupils are
                            given writing materials and refreshments daily.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#25A8D6]">
            <div class="mx-20 py-20">
                <div>
                    <h1 class="text-[#26225F] text-[35px] pb-2 poppins-bold">
                        Apply Now
                    </h1>
                    <p class="text-white poppins-medium text-sm">
                        Fill in the form below to initiate application and we’d
                        get back to you as soon as possible.
                    </p>
                </div>
                <div class="py-10 flex flex-col gap-4">
                    <div class="flex flex-row gap-4">
                        <input
                            class="basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5"
                            type="text"
                            placeholder="Name of Beneficiary"
                        />
                        <input
                            class="basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5"
                            type="text"
                            placeholder="Email Address"
                        />
                    </div>
                    <div class="flex flex-row gap-4">
                        <input
                            class="basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5"
                            type="text"
                            placeholder="Contact Number"
                        />
                        <input
                            class="basis-1/2 rounded-full ps-10 placeholder:text-xs py-3.5"
                            type="text"
                            placeholder="Area of Residence"
                        />
                    </div>
                    <div class="relative flex flex-row gap-4">
                        <input
                            class="w-full rounded-full ps-10 placeholder:text-xs py-3.5"
                            type="text"
                            placeholder="Program Applying To"
                        />
                        <div
                            class="absolute inset-y-0 end-0 flex items-center pr-10"
                        >
                            <img src="/images/collapse-arrrow.png" alt="" />
                        </div>
                    </div>
                    <div class="relative flex flex-row gap-4">
                        <form class="w-full">
                            <textarea
                                class="w-full h-72 rounded-3xl ps-10 placeholder-start-0 placeholder:text-xs py-3.5"
                                placeholder="Program Applying To"
                            ></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <x-footer></x-footer>
    </body>
</html>
