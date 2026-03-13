<x-guest-layout title="Programs - Inspire Scholarship" page="programs">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset("/images/rectangle-background.png") }}');">
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
                        <!-- <li>Lunch</li> -->
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

    {{-- <x-beneficiary-form programme="1" /> --}}
    <div class="bg-[#25A8D6] px-8 lg:px-20 py-20">
        <div>
            <h1 class="text-[#26225F] text-[48px] pb-2 montserrat-bold font-extrabold">
                Apply Now
            </h1>
            <p class="text-white montserrat-medium text-[20] font-semibold">
                Fill in the form below to initiate application and we’d
                get back to you as soon as possible.
            </p>
        </div>

        <form method="POST" action="/beneficiaries" enctype="multipart/form-data" class="py-10 flex flex-col gap-4">

            @csrf

            <!-- NAME + EMAIL -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="name" type="text"
                        placeholder="Name of Beneficiary" value="{{ old("name") }}" required />
                    @error("name")
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

            <!-- CONTACT + RESIDENCE -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="contact_number" type="text"
                        placeholder="Contact Number" value="{{ old("contact_number") }}" required />
                    @error("contact_number")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full relative">
                    <input class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5 text-gray-500" name="school_name" type="text"
                        placeholder="School Name" value="{{ old("school_name") }}" required />

                    @error("school_name")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <!-- DOB + GENDER -->
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full relative">
                    <input class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5 text-gray-500" name="date_of_birth"
                        type="text" placeholder="Date of Birth" onfocus="(this.type='date')"
                        onblur="if(!this.value)this.type='text'" value="{{ old("date_of_birth") }}" required />

                    @error("date_of_birth")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full">
                    <select class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old("gender") == "Male" ? "selected" : "" }}>Male</option>
                        <option value="Female" {{ old("gender") == "Female" ? "selected" : "" }}>Female</option>
                    </select>
                    @error("gender")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full relative">
                    <input class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5 text-gray-500" name="state_of_origin"
                        type="text" placeholder="State of Origin" value="{{ old("state_of_origin") }}"
                        required />

                    @error("state_of_origin")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full relative">
                    <input class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5 text-gray-500" name="mother_occupation"
                        type="text" placeholder="Mother's Occupation" value="{{ old("mother_occupation") }}"
                        required />

                    @error("mother_occupation")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full relative">
                    <input class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5 text-gray-500" name="father_occupation"
                        type="text" placeholder="Father's Occupation" value="{{ old("father_occupation") }}"
                        required />

                    @error("father_occupation")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>

                <div class="w-full relative">
                    <input class="w-full rounded-full ps-6 pr-6 placeholder:text-xs py-3.5 text-gray-500" name="class_grade"
                        type="text" placeholder="Class Grade" value="{{ old("class_grade") }}" required />

                    @error("class_grade")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="flex flex-col lg:flex-row gap-4">
                <div class="w-full">
                    <input class="w-full rounded-full ps-6 placeholder:text-xs py-3.5" name="area_of_residence" type="text"
                        placeholder="Area of Residence" value="{{ old("area_of_residence") }}" required />
                    @error("area_of_residence")
                        <small class="text-red-200">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- IMAGE UPLOAD -->
            <div class="w-full flex flex-col gap-2">

                <label class="text-white font-semibold">Upload Beneficiary Image</label>

                <label for="beneficiary_image"
                    class="cursor-pointer bg-white text-[#26225F] rounded-full px-6 py-3 text-center font-semibold hover:bg-gray-100 transition">
                    Choose Image
                </label>

                <input id="beneficiary_image" name="beneficiary_image" type="file" accept="image/*"
                    class="hidden" onchange="previewImage(event)" />

                @error("beneficiary_image")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror

                <!-- Preview -->
                <img id="imagePreview"
                    class="hidden mt-4 w-40 h-40 object-cover rounded-2xl border-4 border-white shadow-lg" />
            </div>

            <!-- PURPOSE -->
            <div>
                <textarea class="w-full h-72 rounded-3xl ps-6 placeholder:text-xs py-3.5"
                    placeholder="Please share your motivation for applying for this program in no more than word 500"
                    name="purpose_of_application" required>{{ old("purpose_of_application") }}</textarea>

                @error("purpose_of_application")
                    <small class="text-red-200">{{ $message }}</small>
                @enderror
            </div>

            <input type="hidden" name="programme" value= "1">

            <button type="submit"
                class="text-white bg-[#26225F] px-20 py-2 rounded-full w-fit hover:bg-[#1b1947] transition">
                Submit
            </button>

        </form>
    </div>
</x-guest-layout>
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
