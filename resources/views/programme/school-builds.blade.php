<x-guest-layout title="Programs - School Build" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                School Build
            </div>
        </div>
    </div>

    <div class="w-full py-20 px-8 lg:px-20 flex flex-col gap-16">
        <div class="w-full sm:flex lg:flex-row sm:flex-col items-start space-y-10 lg:space-y-0 lg:space-x-10">
            <div class="w-full lg:w-1/2 space-y-12">
                <div class="text-lg montserrat-light font-normal">
                    A lot of public schools in Africa lack basic infrastructure. The Special Foundation seeks to build
                    schools to make sure more children have access to a safe and quality learning environment. We
                    believe this is critical to ensuring more children gain access to quality education.

                    <p class="text-lg montserrat-light pt-2 font-normal">
                        We work with the relevant education ministries and local governments to identify communities that
                        require good and safe learning infrastructures and then build or renovate a school in that
                        location.
                    </p>

                    <p class="text-lg montserrat-light pt-2 font-normal">
                        Our programs ensure the provision of classroom furniture (desks, chairs and more) and school
                        infrastructure including formal walls, windows, and doors to enhance ventilation and lighting.
                        We employ the use of local contractors, building materials and techniques to support local economies
                    </p>
                </div>

                
                <div class="py-4 px-14 bg-[#26225F] text-white montserrat-thin font-normal w-fit">
                    <p>“School is a building which has four walls with
                        tomorrow inside.” - Lon Watters</p>
                </div>
            </div>
            <div class="w-full lg:w-1/2 rounded-2xl">
                {{-- <img src="/images/school_build_1.png" alt=""> --}}
                <iframe class="w-full h-[315px]" src="https://www.youtube.com/embed/Mm8ZZWhKoXU"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_1.png" alt="A Brightly Decorated Classroom for the Students" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_6.png" alt="Smiling Children in the Classroom" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_7.png" alt="" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_5.png" alt="An Aerial View of the School Compound" loading="lazy" class="rounded-3xl">
            </div>
        </div>

        <div class="w-full flex flex-wrap md:flex-nowrap gap-8">
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_2.png" alt="A Clear View of the Before and After of the School Playground" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_3.png" alt="A Clear View of the Before and After of the School Classrooms" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_4.png" alt="A Side View of the Long School Blocks With Classrooms" loading="lazy" class="rounded-3xl">
            </div>
            <div class="md:basis-1/2 lg:basis-1/4 rounded-2xl">
                <img src="/images/v1_school_build_8.png" alt="Students Learning in the Classroom" loading="lazy" class="rounded-3xl h-full">
            </div>
        </div>
    </div>

    <div class="bg-[#25A8D6] px-8 lg:px-20 py-20">
        <div>
            <h1 class="text-[#26225F] text-[48px] leading-[52px] pb-2 montserrat-bold font-extrabold">
                School Build Expression of Interest
            </h1>
            <p class="text-white montserrat-medium text-[20] font-semibold">
                Fill in the form below to tell us about your school and we’d
                get back to you as soon as possible.
            </p>
        </div>

        <form method="POST" action="/school-build-interest" enctype="multipart/form-data"
            class="py-10 flex flex-col gap-4">

            @csrf

            <!-- SCHOOL + CONTACT PERSON -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="school_name" type="text"
                        placeholder="School Name" value="{{ old("school_name") }}" required />
                    @error("school_name")
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

            <!-- CONTACT NUMBER + SCHOOL ADDRESS -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="contact_number"
                        type="text" placeholder="Contact Number" value="{{ old("contact_number") }}" required />
                    @error("contact_number")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="school_address"
                        type="text" placeholder="School Address" value="{{ old("school_address") }}" required />
                    @error("school_address")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- STATE + LGA -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="state" type="text"
                        placeholder="State" value="{{ old("state") }}" required />
                    @error("state")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="lga" type="text"
                        placeholder="Local Government Area" value="{{ old("lga") }}" required />
                    @error("lga")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- NUMBER OF STUDENTS -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5 text-gray-500"
                        name="number_of_students" type="number" min="1" placeholder="Number of Students"
                        value="{{ old("number_of_students") }}" required />
                    @error("number_of_students")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- SCHOOL PROPERTY OWNERSHIP -->
            <div class="flex flex-col lg:flex-row gap-4 pt-2">
                <div class="w-full flex flex-col gap-3">
                    <label class="text-white montserrat-medium font-semibold">School Property Ownership</label>
                    <div class="flex flex-row flex-wrap gap-3">
                        @foreach (\App\Models\SchoolBuildInterest::getOwnershipOptions() as $option)
                            <label
                                class="flex items-center gap-3 bg-white rounded-full px-6 py-3 cursor-pointer text-sm text-[#26225F]">
                                <input type="checkbox" name="property_ownership[]" value="{{ $option }}"
                                    class="accent-[#26225F] w-4 h-4"
                                    {{ in_array($option, old("property_ownership", [])) ? "checked" : "" }} />
                                {{ $option }}
                            </label>
                        @endforeach
                    </div>
                    @error("property_ownership")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- WHAT DOES THE SCHOOL NEED -->
            <div class="flex flex-col gap-2 pt-2">
                <label class="text-white montserrat-medium font-semibold">
                    What does the school need?
                </label>
                <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="school_needs" type="text"
                    placeholder="e.g. new classroom blocks, roofing, furniture, toilets, water supply"
                    value="{{ old("school_needs") }}" required />
                @error("school_needs")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror
            </div>

            <!-- TELL US MORE -->
            <div class="flex flex-col gap-2">
                <label class="text-white montserrat-medium font-semibold">
                    Tell us more about the school’s needs
                </label>
                <textarea class="w-full h-48 rounded-3xl ps-6 placeholder:text-xs py-3.5" name="needs_details"
                    placeholder="Describe the current condition of the school and what would make the biggest difference"
                    required>{{ old("needs_details") }}</textarea>
                @error("needs_details")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror
            </div>

            <!-- PHOTO UPLOAD -->
            <div class="w-full flex flex-col gap-2">
                <label class="text-white montserrat-medium font-semibold">Upload School Photos</label>

                <label for="school_photos"
                    class="cursor-pointer bg-white text-[#26225F] rounded-full px-6 py-3 text-center font-semibold hover:bg-gray-100 transition">
                    Choose Photos
                </label>

                <input id="school_photos" name="photos[]" type="file" accept="image/*" multiple class="hidden"
                    onchange="previewSchoolPhotos(event)" />

                <small class="text-white/80 text-xs">You can upload up to 6 photos (JPG or PNG, max 4MB each).</small>

                @error("photos")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror
                @error("photos.*")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror

                <!-- Previews -->
                <div id="schoolPhotoPreviews" class="flex flex-row flex-wrap gap-3 mt-2"></div>
            </div>

            <button type="submit"
                class="text-white bg-[#26225F] px-20 py-2 rounded-full w-fit hover:bg-[#1b1947] transition">
                Submit
            </button>

        </form>
    </div>

    <script>
        function previewSchoolPhotos(event) {
            const previews = document.getElementById('schoolPhotoPreviews');
            previews.innerHTML = '';

            Array.from(event.target.files).slice(0, 6).forEach((file) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-28 h-28 object-cover rounded-2xl border-4 border-white shadow-lg';
                    previews.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</x-guest-layout>
