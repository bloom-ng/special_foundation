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
                <img src="/images/mentorship_1.png" alt="Mentor and mentees Image">
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_2.png" alt="Mentor visually mentoring students">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_3.png" alt="Mentors visually mentoring students">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_4.png" alt="Mentor visually mentoring students">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/mentorship_5.png" alt="Mentor visually mentoring students">
            </div>
        </div>
    </div>

    <div class="bg-[#25A8D6] px-8 lg:px-20 py-20">
        <div>
            <h1 class="text-[#26225F] text-[48px] pb-2 montserrat-bold font-extrabold">
                Express Interest
            </h1>
            <p class="text-white montserrat-medium text-[20] font-semibold">
                Fill in the form below to express interest in hosting a Mentorship/Career Day
                session and we’d get back to you as soon as possible.
            </p>
        </div>

        <form method="POST" action="/mentorship-interest" class="py-10 flex flex-col gap-4">

            @csrf

            <!-- ORGANISATION + CONTACT PERSON -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="organisation_name"
                        type="text" placeholder="Organisation/School Name"
                        value="{{ old("organisation_name") }}" required />
                    @error("organisation_name")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="contact_person"
                        type="text" placeholder="Contact Person" value="{{ old("contact_person") }}" required />
                    @error("contact_person")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- ROLE + EMAIL -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="role" type="text"
                        placeholder="Role" value="{{ old("role") }}" required />
                    @error("role")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="email" type="email"
                        placeholder="Email Address" value="{{ old("email") }}" required />
                    @error("email")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- CONTACT NUMBER + LOCATION -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="contact_number"
                        type="text" placeholder="Contact Number" value="{{ old("contact_number") }}" required />
                    @error("contact_number")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="location" type="text"
                        placeholder="Location" value="{{ old("location") }}" required />
                    @error("location")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- LGA + NUMBER OF STUDENTS -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="lga" type="text"
                        placeholder="Local Government Area" value="{{ old("lga") }}" required />
                    @error("lga")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5 text-gray-500"
                        name="number_of_students" type="number" min="1" placeholder="Number of Students"
                        value="{{ old("number_of_students") }}" required />
                    @error("number_of_students")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- AGE / CLASS RANGE -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="age_class_range"
                        type="text" placeholder="Age/Class Range" value="{{ old("age_class_range") }}" required />
                    @error("age_class_range")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- SUPPORT AREAS -->
            <div class="w-full flex flex-col gap-3 pt-2">
                <label class="text-white montserrat-medium font-semibold">
                    What area would you like students to receive support in?
                </label>

                <div class="flex flex-row flex-wrap gap-3">
                    @foreach (\App\Models\MentorshipInterest::getSupportAreas() as $area)
                        <label
                            class="flex items-center gap-3 bg-white rounded-full px-6 py-3 cursor-pointer text-sm text-[#26225F]">
                            <input type="checkbox" name="support_areas[]" value="{{ $area }}"
                                class="accent-[#26225F] w-4 h-4"
                                {{ in_array($area, old("support_areas", [])) ? "checked" : "" }}
                                @if ($area === \App\Models\MentorshipInterest::SUPPORT_AREA_OTHER) id="support_area_other_toggle" @endif />
                            {{ $area }}
                        </label>
                    @endforeach
                </div>

                @error("support_areas")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror

                <div id="support_area_other_wrapper"
                    class="{{ in_array(\App\Models\MentorshipInterest::SUPPORT_AREA_OTHER, old("support_areas", [])) ? "" : "hidden" }}">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="support_area_other"
                        type="text" placeholder="Please specify the other area of support"
                        value="{{ old("support_area_other") }}" />
                    @error("support_area_other")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- SESSION GOALS -->
            <div class="flex flex-col gap-2 pt-2">
                <label class="text-white montserrat-medium font-semibold">
                    What would you like students to gain from the session?
                </label>
                <textarea class="w-full h-48 rounded-3xl ps-6 placeholder:text-xs py-3.5" name="session_goals"
                    placeholder="Share what you would like the students to take away from the session"
                    required>{{ old("session_goals") }}</textarea>
                @error("session_goals")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror
            </div>

            <!-- ADDITIONAL INFORMATION -->
            <div class="flex flex-col gap-2">
                <label class="text-white montserrat-medium font-semibold">
                    Additional Information
                </label>
                <textarea class="w-full h-48 rounded-3xl ps-6 placeholder:text-xs py-3.5"
                    name="additional_information"
                    placeholder="Anything else we should know? (optional)">{{ old("additional_information") }}</textarea>
                @error("additional_information")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-[#26225F] px-20 py-2 rounded-full w-fit hover:bg-[#1b1947] transition">
                Submit
            </button>

        </form>
    </div>

    <script>
        (function() {
            const otherToggle = document.getElementById('support_area_other_toggle');
            const otherWrapper = document.getElementById('support_area_other_wrapper');

            if (otherToggle && otherWrapper) {
                otherToggle.addEventListener('change', function() {
                    otherWrapper.classList.toggle('hidden', !otherToggle.checked);

                    if (!otherToggle.checked) {
                        otherWrapper.querySelector('input').value = '';
                    }
                });
            }
        })();
    </script>
</x-guest-layout>
