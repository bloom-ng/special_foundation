<x-guest-layout title="Special Foundation - Donate" page="donate">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset("/images/rectangle-background.png") }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Support The Foundation
            </div>
        </div>
    </div>

    <div class="p-8 lg:p-20">
        <div class="flex flex-col-reverse lg:flex-row items-start justify-center gap-10">
            <div class="w-full lg:w-[60%]">
                <h2
                    class="font-montserrat text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:text-7xl xl:leading-none text-[#25A8D6]">
                    Donate
                </h2>
                <p class="text-xl mt-6 pb-4 border-[#25A8D6] pl-5 border-l-[14px]">
                    Your generosity fuels access, opportunity, and transformation. Every donation supports life-changing
                    scholarships, expands our free Special Summer School program to more children, and strengthens
                    school infrastructure to create safe, inspiring learning environments. Together, we turn access to
                    education into a measurable impact for thousands of young lives
                </p>
                <div class="grid md:grid-cols-2 gap-6 mt-10">

                    <div class="bg-[#F5FAFD] border border-[#25A8D6] p-6 rounded-xl">
                        <h3 class="montserrat-bold text-lg">Fund a Year of Tuition</h3>
                        <p class="montserrat-medium mt-2">
                           With ₦300,000, you can give a child uninterrupted access to quality education for an entire academic year. Your support covers tuition and essential learning needs, helping a child stay in school, learn with confidence, and build a brighter future.
                        </p>
                    </div>

                    <div class="bg-[#F5FAFD] border border-[#25A8D6] p-6 rounded-xl">
                        <h3 class=" montserrat-bold text-lg">Support a Summer School Student</h3>
                        <p class="montserrat-medium mt-2">
                            With ₦39,000, you can support a child during the 4&ndash;6 weeks of free learning,
                            mentorship, and enrichment at the Special Summer School.
                        </p>
                    </div>

                    <div class="bg-[#F5FAFD] border border-[#25A8D6] p-6 rounded-xl">
                        <h3 class="montserrat-bold text-lg">Support School Infrastructure</h3>
                        <p class="montserrat-medium mt-2">
                            Help build and improve safe, well-equipped learning environments for children.
                        </p>
                    </div>

                    <div class="bg-[#F5FAFD] border border-[#25A8D6] p-6 rounded-xl flex items-center justify-center">
                        <a href="https://paystack.shop/pay/ejyy1q12rf"
                            class="text-white bg-[#25A8D6] px-6 py-3 rounded-full montserrat-medium text-sm">
                            Support a Child’s Education
                        </a>
                    </div>

                </div>
            </div>
            <div class="w-full lg:w-[40%]">
                <img src="/images/donate.png" alt="Image of a girl holding a The Special Youth Book">
            </div>
        </div>

        <div class="w-full max-w-5xl mx-auto mt-24">
            <div class="w-full bg-[#F5FAFD] border border-[#25A8D6] rounded-2xl p-8">

                <!-- Title -->
                <h3 class="montserrat-bold text-2xl text-[#26225F] mb-4">
                    Donate Offline
                </h3>

                <x-bank-details />

                <!-- Online Donate Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-start gap-6 mt-10">

                    <a class="text-white font-light py-[15px] px-[30px] rounded-full bg-[#25A8D6] montserrat-thin text-sm md:text-lg text-center"
                        href="https://paystack.shop/pay/h34dhapt3d" target="_blank">
                        DONATE ONLINE (NGN)
                    </a>

                    <div class="flex flex-col gap-2">
                        <a class="text-white font-light py-[15px] px-[30px] rounded-full bg-[#25A8D6] montserrat-thin text-sm md:text-lg text-center"
                            href="https://paystack.shop/pay/p3ha2q123l" target="_blank">
                            DONATE ONLINE (USD)
                        </a>
                        <p class="montserrat-thin text-sm text-[#26225F] text-center">
                            Giving from the US?
                            @if (config('support.globalgiving_url'))
                                <a href="{{ config('support.globalgiving_url') }}" target="_blank" rel="noopener noreferrer"
                                    class="text-[#25A8D6] underline">Donate through GlobalGiving.</a>
                            @else
                                Donate through GlobalGiving.
                            @endif
                        </p>
                    </div>

                </div>

                <div class="mt-8">
                    <a href="/ways-to-support" class="montserrat-medium text-[#25A8D6] underline">
                        See more ways to support The Special Foundation
                    </a>
                </div>

            </div>

            <p
                class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9 my-8">
                You can also fill the form below and we will contact you to complete your donation
            </p>

            <form action="/donate" method="POST" class="w-full flex flex-col space-y-8">
                @csrf
                <input
                    class="w-full h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black montserrat-thin font-normal"
                    type="text" name="name" placeholder="Your Full Name" required />

                <div class="w-full flex flex-col lg:flex-row items-center gap-8">
                    <input
                        class="w-full lg:flex-1 lg:min-w-0 h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black montserrat-thin font-normal"
                        type="email" name="email" placeholder="Email Address" required />

                    <input
                        class="w-full lg:flex-1 lg:min-w-0 h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black montserrat-thin font-normal"
                        type="text" name="contact_number" placeholder="Contact Number" required />
                </div>

                <p
                    class="montserrat-thin text-base font-bold leading-6 text-left md:text-lg lg:text-xl xl:text-2xl md:leading-7 lg:leading-8 xl:leading-9 text-[#26225F]">
                    How did you hear about us?
                </p>

                <select
                    class="w-full h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black montserrat-thin font-normal"
                    type="text" name="source" placeholder="Select an option" required>
                    <option disabled value="">Select an option</option>
                    <option value="1">Social Media</option>
                    <option value="2">Google Search</option>
                    <option value="3">Word of Mouth</option>
                    <option value="4">Online Advertising</option>
                    <option value="5">Email Marketing</option>
                    <option value="6">Content Marketing</option>
                    <option value="7">Event or Conference</option>
                    <option value="8">Referral from Partner or Affiliate</option>
                    <option value="9">Online Directory or Listing</option>
                    <option value="10">Other (specify in comment)</option>
                </select>

                <textarea
                    class="w-full min-h-[172px] pt-[25px] pb-[25px] pl-[50px] rounded-3xl border-[#25A8D6] border-[1px] text-black placeholder:text-black montserrat-thin font-normal"
                    type="text" name="comments" placeholder="Comments [Optional]"></textarea>

                <button
                    class="text-white font-normal w-[308px] h-[54px] pr-[10px] pl-[10px] rounded-full bg-[#26225F] montserrat-light text-md leading-[18px] tracking-wider text-center md:text-xl md:leading-[26px] lg:leading-[28px] xl:leading-[30px] mt-10 montserrat-thin"
                    type="submit">SUBMIT</button>

            </form>
        </div>

    </div>

</x-guest-layout>
