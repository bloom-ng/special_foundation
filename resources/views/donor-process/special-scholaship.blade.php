<x-guest-layout title="Programs - Inspire Scholarship" page="programs">
    <style>
        swiper-slide {
            transition: transform 10s ease, opacity 0.3s ease;
            opacity: 0.5;
            display: flex;
            justify-content: center;
        }

        swiper-slide.swiper-slide-active {
            transform: scale(1.08);
            opacity: 1;
        }
    </style>

    {{-- HERO --}}
    <div class="relative bg-cover bg-center h-56 bg-[#26225F] bg-blend-multiply">
        <div class="h-full flex flex-col justify-center items-center text-center px-4">
            <h1 class="text-3xl lg:text-5xl font-extrabold text-[#25A8D6]">
                Special Scholarship
            </h1>
            <p class="text-white mt-2 text-lg italic">
                “Every child has a right to an education.”
            </p>
        </div>
    </div>

    <div class="w-full flex flex-col py-12 px-8 lg:px-20 gap-16">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-center space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2">
                <p class="text-lg montserrat-light font-normal mb-4">
                    Sponsor high-performing students in Federal and State universities across Nigeria with verified
                    tuition support and guided academic development.
                </p>
                <p class="text-[#26225F] mt-4 text-lg font-extrabold italic">
                    You choose the impact. We manage the structure. You see the results.
                </p>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                <div class="py-10 px-4 lg:px-20 flex justify-center">
                    <swiper-container slides-per-view="1" centered-slides="true" space-between="20" speed="1000"
                        loop="true" autoplay-delay="8000" autoplay-disable-on-interaction="false"
                        class="w-full max-w-md">
                        <swiper-slide>
                            <div>
                                <img src="/images/AISHA.png">
                            </div>
                        </swiper-slide>

                        <swiper-slide>
                            <div>
                                <img src="/images/DANIEL.png" c>
                            </div>
                        </swiper-slide>

                        <swiper-slide>
                            <div>
                                <img src="/images/SAMUEL.png">
                            </div>
                        </swiper-slide>

                    </swiper-container>
                </div>
            </div>
        </div>
    </div>

    {{-- HOW IT WORKS --}}
    <div class="px-8 lg:px-20 mb-12">
        <h2 class="text-3xl montserrat-bold font-extrabold text-[#26225F] mb-6">How Your Sponsorship Works</h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <h3 class="text-lg montserrat-light font-bold">1. Choose Your Impact</h3>
                <p class="text-lg montserrat-light font-normal">Decide how many scholars you would like to support and
                    select your preferred program, Inspire (primary/secondary) or Special (university). Share any
                    preferences, and we handle the rest.
                </p>
            </div>

            <div>
                <h3 class="text-lg montserrat-light font-bold">2. Get Matched to a Scholar</h3>
                <p class="text-lg montserrat-light font-normal">Receive a curated scholar profile outlining academic
                    performance, verified need status, and a transparent funding breakdown. Every scholar is screened
                    through our internal review and documentation process.
                </p>
            </div>

            <div>
                <h3 class="text-lg montserrat-light font-bold">3. Activate the Sponsorship</h3>
                <p class="text-lg montserrat-light font-normal">Confirm your commitment, and tuition support is
                    processed through approved educational channels. Your scholar receives structured academic guidance
                    under the program.
                </p>
            </div>

            <div>
                <h3 class="text-lg montserrat-light font-bold">4. See the Difference</h3>
                <p class="text-lg montserrat-light font-normal">Receive periodic academic updates and structured reports
                    so you can track progress and measure the impact of your investment over time.
                </p>
            </div>

        </div>
    </div>

    {{-- DONOR FORM --}}
    <div class="bg-[#25A8D6] px-8 lg:px-20 py-16">

        <h2 class="text-3xl font-bold text-[#26225F] mb-8 text-center">
            Special Scholarship – Donor Interest Form
        </h2>

        <form method="POST" action="{{ route('donor.interest.store') }}" class="flex flex-col gap-6 max-w-4xl mx-auto">
            @csrf

            <!-- SECTION 1 -->
            <h3 class="font-bold text-[#26225F] text-lg">Donor Information</h3>

            <!-- NAME + EMAIL -->
            <div class="flex flex-col lg:flex-row gap-4">
                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="name" type="text"
                    placeholder="Full Name" required>

                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="email" type="email"
                    placeholder="Email Address" required>
            </div>

            <!-- PHONE + COUNTRY -->
            <div class="flex flex-col lg:flex-row gap-4">
                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="phone" type="text"
                    placeholder="Phone Number" required>

                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="country" type="text"
                    placeholder="Country (optional)">
            </div>

            <!-- OCCUPATION + LINKEDIN -->
            <div class="flex flex-col lg:flex-row gap-4">
                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="occupation" type="text"
                    placeholder="Occupation">

                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="linkedin" type="text"
                    placeholder="LinkedIn (optional)">
            </div>

            <!-- BIO -->
            <textarea class="w-full rounded-3xl ps-6 py-4 h-32 placeholder:text-xs" name="bio" placeholder="Short Bio"></textarea>


            <!-- SECTION 2 -->
            <h3 class="font-bold text-[#26225F] text-lg">Sponsorship Details</h3>

            <!-- STUDENTS + FIELD -->
            <div class="flex flex-col lg:flex-row gap-4">
                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="students_count" type="number"
                    placeholder="Number of students">

                <input class="w-full rounded-full ps-6 py-3.5 placeholder:text-xs" name="preferred_field" type="text"
                    placeholder="Preferred field (optional)">
            </div>

            <!-- INSTITUTION TYPE -->
            <select class="w-full rounded-full ps-6 py-3.5 text-gray-500" name="institution_type">
                <option value="">Institution Type</option>
                <option>Federal University</option>
                <option>State University</option>
                <option>No Preference</option>
            </select>

            <!-- DURATION -->
            <select class="w-full rounded-full ps-6 py-3.5 text-gray-500" name="duration">
                <option value="">Duration</option>
                <option>One academic year</option>
                <option>Full program duration</option>
            </select>

            <!-- NOTES -->
            <textarea class="w-full rounded-3xl ps-6 py-4 h-32 placeholder:text-xs" name="notes" placeholder="Additional notes"></textarea>


            <!-- AGREEMENT -->
            <label class="flex items-center gap-3 text-white">
                <input
                    type="checkbox"
                    name="agree"
                    value="1"
                    class="w-5 h-5"
                >
                I agree to be contacted by The Special Foundation regarding this sponsorship.
            </label>

            <input type="hidden" name="type" value="special-scholarship-donor">

            <!-- BUTTON -->
            <button type="submit"
                class="text-white bg-[#26225F] px-10 py-3 rounded-full w-fit hover:bg-[#1b1947] transition">
                Express Interest
            </button>

        </form>
    </div>
</x-guest-layout>
