<x-guest-layout title="Special Foundation - Get Involved" page="get_involved">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Get Involved
            </div>
        </div>
    </div>

    <div class="p-8 lg:p-20">
        {{-- PARTNER WITH US START --}}
        <div class="flex flex-col lg:flex-row items-start justify-center 2xl:justify-between gap-10">
            <div class="w-full lg:w-[40%]">
                <h2
                    class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:leading-none text-[#25A8D6] mb-10">
                    Select Partners
                </h2>
                <p
                    class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8">
                    As we scale our work, we appreciate the need for collaboration with organizations and individuals
                    with like-minds who are passionate about furthering the education and educational infrastructure of
                    children all around Africa.
                </p>

                <button id="partner-button"
                    class="text-white font-normal w-[308px] h-[54px] pr-[10px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-lg leading-[24.38px] tracking-wider text-center md:text-xl md:leading-[26px] lg:text-xl lg:leading-[28px] xl:text-xl xl:leading-[30px] mt-10">
                    PARTNER WITH US
                </button>

            </div>

            <div class="w-full lg:w-[60%]">
                <img src="{{ Storage::url($cloud->value) }}" class="" alt="Our Partners">
            </div>
        </div>
        {{-- PARTNER WITH US END --}}

        <div class="flex flex-col items-center justify-center my-12 lg:my-24 gap-10 w-full">
            <h3 class="text-center text-4xl font-extrabold text-[#26225F]">How to partner with us</h3>

            <div class="flex flex-col lg:flex-row items-start justify-center my-12 lg:my-24 gap-10">
                <div class="w-full lg:w-[60%]">
                    <img src="/images/sponsor_a_child.jpg" class="md:h-[400px] h-[200px] w-full rounded-3xl"
                        alt="Group Picture of Special Youths">
                </div>
                <div class="w-full lg:w-[40%]">
                    <h2
                        class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:leading-none text-[#25A8D6] mb-10">
                        Sponsor a child
                    </h2>
                    <p
                        class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8">
                        You can make an annual contribution of N300,000 to cover tuition, uniforms, books, and
                        stationery for a child for a school session or N100,000 to cover tuition, uniforms, books, and
                        stationery for a child for a term.
                    </p>

                    <a href="/donate">
                        <button
                            class="text-white font-normal w-[308px] h-[54px] pr-[10px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-lg leading-[24.38px] tracking-wider text-center md:text-xl md:leading-[26px] lg:text-xl lg:leading-[28px] xl:text-xl xl:leading-[30px] mt-10">
                            Sponsor Now
                        </button>
                    </a>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row items-start justify-center my-12 lg:my-24 gap-10">
                <div class="w-full lg:w-[40%]">
                    <h2
                        class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:leading-none text-[#25A8D6] mb-10">
                        One-off donation
                    </h2>
                    <p
                        class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8">
                        You can donate any amount to a specific project or general activities of the foundation, e.g.,
                        Mentorship or School Build Programs.
                    </p>

                    <a href="/donate">
                        <button
                            class="text-white font-normal w-[308px] h-[54px] pr-[10px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-lg leading-[24.38px] tracking-wider text-center md:text-xl md:leading-[26px] lg:text-xl lg:leading-[28px] xl:text-xl xl:leading-[30px] mt-10">
                            Donate Now
                        </button>
                    </a>
                </div>
                <div class="w-full lg:w-[60%]">
                    <img src="/images/one_off_donation.jpg" class="md:h-[400px] h-[200px] w-full rounded-3xl"
                        alt="Group Picture of Special Youths">
                </div>
            </div>
        </div>

        {{-- VOLUNTEER START --}}
        <div class="flex flex-col lg:flex-row items-start justify-center my-12 lg:my-24 gap-10">
            <div class="w-full lg:w-[60%]">
                <img src="/images/involved_1.png" alt="Group Picture of Special Youths">
            </div>
            <div class="w-full lg:w-[40%]">
                <h2
                    class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:leading-none text-[#25A8D6] mb-10">
                    Be a Volunteer
                </h2>
                <p
                    class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8">
                    The Special Foundation strives to create the right environment for the educational development of
                    underprivileged children including those with absent or late fathers. Volunteer now and join us
                    today to make our world better. <span class="montserrat-bold">We appreciate your support.</span>
                </p>

                <button id="volunteer-button"
                    class="text-white font-normal w-[308px] h-[54px] pr-[10px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-lg leading-[24.38px] tracking-wider text-center md:text-xl md:leading-[26px] lg:text-xl lg:leading-[28px] xl:text-xl xl:leading-[30px] mt-10">
                    VOLUNTEER NOW
                </button>
            </div>
        </div>
        {{-- VOLUNTEER END --}}

        {{-- AMBASSADORS MODAL START --}}
        <div id="ambassador-modal"
            class="fixed inset-0 bg-black/80 bg-opacity-75 flex items-start justify-center lg:p-20 px-8 py-10 overflow-y-scroll hidden z-50">
        </div>
        {{-- AMBASSADORS MODAL END --}}

        {{-- PARTNER WITH US MODAL START --}}
        <div id="partner-modal"
            class="fixed inset-0 bg-black/80 bg-opacity-75 flex items-start justify-center lg:p-20 px-8 py-10 overflow-y-scroll hidden z-20">
            <div
                class="flex flex-col items-center justify-center p-8 lg:p-20 rounded-3xl bg-[#EDEDED] w-[90%] md:w-[70%] xl:w-[60%]">
                <h2
                    class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-5xl lg:leading-none xl:leading-none text-[#25A8D6] mb-12">
                    Partner With Us
                </h2>

                <form action="/partners" method="POST" class="w-full flex flex-col items-center justify-center gap-8">
                    @csrf
                    <div class="w-full flex flex-col lg:flex-row items-center justify-center gap-8">
                        <input type="text" name="name"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Name" />
                        <input type="email" name="email"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Email Address" />
                    </div>
                    <div class="w-full flex flex-col lg:flex-row items-center justify-center gap-8">
                        <input type="text" name="contact_number"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Contact Number" />
                        <input type="text" name="area_of_residence"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Area of Residence" />
                    </div>
                    <textarea name="purpose_of_application" id="" cols="30" rows="10"
                        placeholder="Purpose for Applicaiton"
                        class="w-full rounded-3xl border border-[#25A8D6] px-4 py-4 montserrat-thin font-light text-black"></textarea>

                    <button
                        class="bg-[#26225F] rounded-full px-4 py-4 w-[90%] md:w-[40%] text-white montserrat-thin font-light text-base lg:text-lg">Submit</button>
                </form>
            </div>
        </div>
        {{-- PARTNER WITH US MODAL END --}}

        {{-- VOLUNTEER NOW MODAL START --}}
        <div id="volunteer-modal"
            class="fixed inset-0 bg-black/80 bg-opacity-75 flex items-start justify-center lg:p-20 px-8 py-10 overflow-y-scroll hidden z-20">
            <div
                class="flex flex-col items-center justify-center p-8 lg:p-20 rounded-3xl bg-[#EDEDED] w-[90%] md:w-[70%] xl:w-[60%]">
                <h2
                    class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-5xl lg:leading-none xl:leading-none text-[#25A8D6] mb-12">
                    Volunteer Now
                </h2>

                <form action="/volunteer" method="POST" class="w-full flex flex-col items-center justify-center gap-8">
                    @csrf
                    <input type="text" name="full_name"
                        class="w-full rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                        placeholder="Full Name" required />

                    <div class="w-full flex flex-col items-start ml-16">
                        <h5 class="montserrat-thin font-semibold text-base text-[#25A8D6] mb-3">Gender</h5>
                        @foreach ($genderMapping as $key => $value)
                            <div class="flex items-center justify-center gap-3">
                                <input class="montserrat-thin font-normal my-4 h-8 w-8" type="radio" name="gender"
                                    value="{{ $key }}" id="{{ $key }}">
                                <label for="{{ $key }}">{{ $value }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-full flex flex-col lg:flex-row items-center justify-center gap-8">
                        <input type="email" name="email"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Email Address" required />
                        <input type="text" name="contact_number"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Contact Number" required />
                    </div>

                    <div class="w-full flex flex-col lg:flex-row items-center justify-center gap-8">
                        <input type="text" name="area_of_residence"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Area of Residence" required />

                        <input type="text" name="religious_affirmation"
                            class="w-full lg:w-[50%] rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            placeholder="Religious Affirmation" />
                    </div>

                    <div class="w-full flex flex-col items-start gap-8">
                        <h5 class="montserrat-thin font-semibold text-base text-[#25A8D6] mb-3">Availability</h5>
                        <p>Please confirm your availability for volunteering? (Select only one)</p>
                        @foreach ($availabilityMapping as $key => $value)
                            <div class="flex items-center justify-center gap-3"s>
                                <input type="radio" name="availability"
                                    class="montserrat-thin font-normal my-4 h-8 w-8" value="{{ $key }}"
                                    id="{{ $key }}">
                                <label for="{{ $key }}">{{ $value }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-full flex flex-col  gap-8">
                        <h5 class="montserrat-thin font-semibold text-base text-[#25A8D6] mb-3">Specify Time</h5>
                        <label for="specify_time">From</label>
                        <input type="time" name="specify_time"
                            class="w-full rounded-full border border-[#25A8D6] px-6 py-2 montserrat-thin font-light text-black"
                            placeholder="Specify Time" />
                        <label for="specify_time_to">To</label>
                        <input type="time" name="specify_time_to"
                            class="w-full rounded-full border border-[#25A8D6] px-6 py-2 montserrat-thin font-light text-black"
                            placeholder="Specify Time" />

                    </div>

                    <div class="w-full flex flex-col  gap-8">

                        <h5 class="montserrat-thin font-semibold text-base text-[#25A8D6] mb-3">Specify Frequency</h5>
                        <select
                            class="w-full rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            name="times_per_week_month">
                            <option value="">Select an option</option>
                            @foreach ($timesPerWeekMapping as $key => $value)
                                <option class="montserrat-thin font-normal my-4 h-8 w-8" value="{{ $key }}">
                                    {{ $value }}</option>
                            @endforeach
                        </select>

                    </div>

                    <input type="text" name="other"
                        class="w-full rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                        placeholder="Other (Specify)" />

                    <div class="w-full flex flex-col items-start ml-16">
                        <h5 class="montserrat-thin font-semibold text-base text-[#25A8D6] mb-3">Interests</h5>
                        @foreach ($interestMapping as $key => $value)
                            <div class="flex items-center justify-center gap-3"s>
                                <input type="checkbox" name="interests[]"
                                    class="montserrat-thin font-normal my-4 h-8 w-8" value="{{ $key }}"
                                    id="{{ $key }}">
                                <label for="{{ $key }}">{{ $value }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="w-full flex flex-col items-start">
                        <h5 class="montserrat-thin font-semibold text-base text-[#25A8D6] mb-3 ml-10">How did you hear
                            about
                            us
                        </h5>
                        <select
                            class="w-full rounded-full border border-[#25A8D6] px-6 py-4 montserrat-thin font-light text-black"
                            name="source">
                            <option value="">Select an option</option>
                            @foreach ($sourceMapping as $key => $value)
                                <option class="montserrat-thin font-normal my-4 h-8 w-8" value="{{ $key }}">
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button
                        class="bg-[#26225F] rounded-full px-4 py-4 w-[90%] md:w-[40%] text-white montserrat-thin font-light text-base lg:text-lg">Submit</button>
                </form>
            </div>
        </div>
        {{-- VOLUNTEER NOW MODAL END --}}

    </div>
    {{-- // const ambassadors = @json($ambassadors); --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modal = document.getElementById('ambassador-modal');
            const partner = document.getElementById('partner-modal');
            const volunteer = document.getElementById('volunteer-modal');

            document.querySelectorAll('.grid img').forEach(img => {
                img.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    const ambassador = ambassadors[index];

                    const content =
                        `<div class="flex flex-col lg:flex-row items-start justify-center bg-white rounded-3xl p-10 lg:px-20 lg:py-14 gap-12">
                            <img src="${ambassador.image}" alt="${ambassador.name}">
                            <div class="flex flex-col items-start gap-8">
                                <h3 class="montserrat-bold text-[#25A8D6] text-2xl">${ambassador.name}</h3>
                                <p class="montserrat-thin font-light">
                                    ${ambassador.content}
                                </p>
                                <a href="${ambassador.link}">
                                    <img src="/images/detail_icon.svg" alt="Linkedin Icon">
                                </a>
                            </div>
                        </div>`;

                    modal.innerHTML = content;
                    modal.classList.remove('hidden');
                });
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });


            document.getElementById('partner-button').addEventListener('click', function() {
                partner.classList.remove('hidden')
            })

            partner.addEventListener('click', function(e) {
                if (e.target === partner) {
                    partner.classList.add('hidden');
                }
            });

            document.getElementById('volunteer-button').addEventListener('click', function() {
                volunteer.classList.remove('hidden')
            })

            volunteer.addEventListener('click', function(e) {
                if (e.target === volunteer) {
                    volunteer.classList.add('hidden');
                }
            });
        });
    </script>

</x-guest-layout>
