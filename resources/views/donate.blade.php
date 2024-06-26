<x-guest-layout title="Special Foundation - Donate" page="donate">
    <div class="relative bg-cover bg-center h-40"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full bg-[#26225F]/95">
            <div class="h-full flex flex-row justify-center items-center text-[35px] poppins-semibold text-[#25A8D6]">
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

                <p
                    class="montserrat-thin text-base font-bold leading-6 text-left md:text-lg lg:text-xl xl:text-2xl md:leading-7 lg:leading-8 xl:leading-9 my-8 text-[#26225F]">
                    Donate Offline
                </p>

                <p
                    class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9 my-8">
                    Please donate via bank transfer:
                </p>

                <p
                    class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9 my-8">
                    The Special Youth Leadership Foundation
                </p>

                <div class="flex items-start justify-start gap-10">
                    <div class="w-[179px] min-h-[204px] bg-[#25A8D6] p-8 text-white">
                        <p
                            class="montserrat-thin text-base font-bold leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9">
                            Naira</p>
                        <p
                            class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9">
                            Zenith Bank
                            5071271021
                            <br><br>
                            FCMB
                            8763293012

                        </p>

                    </div>

                    <div class="w-[266px] min-h-[156px] bg-[#25A8D6] p-8 text-white">
                        <p
                            class="montserrat-thin text-base font-bold leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9">
                            USD</p>
                        <p
                            class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9">
                            Zenith Bank <br>
                            5071271021 <br>
                            Swift Code: ZEIBNGLA
                        </p>

                    </div>

                </div>

                <p
                    class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:leading-8 xl:leading-9 my-8">
                    You can also fill the form below and we will contact you to complete your donation
                </p>

                <form action="/donate" method="POST" class="w-full flex flex-col space-y-8">
                    @csrf
                    <input
                        class="max-w-[852px] h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black"
                        type="text" name="name" placeholder="Your Full Name" required />

                    <div class="w-full flex flex-col lg:flex-row items-center gap-8 lg:gap-2">
                        <input
                            class="w-full lg:max-w-[430px] h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black"
                            type="email" name="email" placeholder="Email Address" required />

                        <input
                            class="w-full lg:max-w-[430px] h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black"
                            type="text" name="contact_number" placeholder="Contact Number" required />
                    </div>

                    <p
                        class="montserrat-thin text-base font-bold leading-6 text-left md:text-lg lg:text-xl xl:text-2xl md:leading-7 lg:leading-8 xl:leading-9 text-[#26225F]">
                        How did you hear about us?
                    </p>

                    <select
                        class="max-w-[852px] h-[72px] pt-[25px] pb-[25px] pl-[50px] rounded-full border-[#25A8D6] border-[1px] text-black placeholder:text-black"
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
                        class="max-w-[852px] min-h-[172px] pt-[25px] pb-[25px] pl-[50px] rounded-3xl border-[#25A8D6] border-[1px] text-black placeholder:text-black"
                        type="text" name="comments" placeholder="Comments [Optional]"></textarea>

                    <button
                        class="text-white font-normal w-[308px] h-[54px] py-[15px] pr-[10px] pl-[10px] rounded-full bg-[#26225F] montserrat-light text-md leading-[18px] tracking-wider text-center md:text-xl md:leading-[26px] lg:leading-[28px] xl:leading-[30px] mt-10"
                        href="https://paystack.com/pay/ejyy1q12rf" target="_blank">SUBMIT</button>

                </form>

                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-start gap-0 lg:gap-8">
                    <a class="text-white font-normal w-[308px] h-[54px] py-[15px] pr-[10px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-md leading-[18px] tracking-wider text-center md:text-xl md:leading-[26px] lg:leading-[28px] xl:leading-[30px] mt-10"
                        href="https://paystack.com/pay/ejyy1q12rf" target="_blank">DONATE ONLINE (NGN)</a>

                    <a class="text-white font-normal w-[308px] h-[54px] py-[15px] pr-[10px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-md leading-[18px] tracking-wider text-center md:text-xl md:leading-[26px] lg:leading-[28px] xl:leading-[30px] mt-10"
                        href="https://paystack.com/pay/md1d9s2p91" target="_blank">DONATE ONLINE (USD)</a>
                </div>
            </div>
            <div class="w-full lg:w-[40%]">
                <img src="/images/donate.png" alt="Image of a girl holding a The Special Youth Book">
            </div>
        </div>

    </div>

</x-guest-layout>
