<x-guest-layout title="Special Foundation - Get Involved" page="get_involved">
    <div class="relative bg-cover bg-center h-40"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full bg-[#26225F]/95">
            <div class="h-full flex flex-row justify-center items-center text-[35px] poppins-semibold text-[#25A8D6]">
                Get Involved
            </div>
        </div>
    </div>

    <div class="p-8 lg:p-20">
        <h2
            class="montserrat-bold text-4xl font-extrabold leading-none text-left md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:text-7xl xl:leading-none text-[#25A8D6] mb-12">
            Ambassadors
        </h2>

        <p
            class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9">
            Our Ambassadors are carefully selected members of the public who have, in the year of review, identified
            with, and consistently exemplify our values in promoting the objectives of the Foundation.
            <br>
            <br>

            They constantly contribute time, effort and resources to achieve the objectives of the Foundation thereby
            ensuring that underprivileged talented children are equipped with adequate education, mentoring and
            leadership training to transform them to be positive change agents within their respective communities.
            <br>
            <br>

            We are pleased to introduce our Ambassadors for the current year:
        </p>

        {{-- AMBASSADORS LIST START --}}
        <div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-12 my-12">
            @foreach ($ambassadors as $index => $ambassador)
                <img src="{{ $ambassador['list_image'] }}" alt="{{ $ambassador['name'] }}" class="my-5 cursor-pointer"
                    data-index="{{ $index }}">
            @endforeach
        </div>
        {{-- AMBASSADORS LIST END --}}

        <p
            class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9">
            You may identify with us by volunteering for our activities, donating/securing donations for the foundation
            and/or proactively publicizing the activities and objectives of the Foundation.
        </p>

        <div class="flex flex-col lg:flex-row items-center justify-center my-12 lg:my-24 gap-10">
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

                <button
                    class="text-white font-normal w-[308px] h-[54px] pt-[15px] pr-[10px] pb-[15px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-lg leading-[24.38px] tracking-wider text-center md:text-xl md:leading-[26px] lg:text-xl lg:leading-[28px] xl:text-xl xl:leading-[30px] mt-10">
                    PARTNER WITH US
                </button>

            </div>

            <div class="w-full lg:w-[60%]">
                {{-- MOBILE PARTNER START --}}
                <swiper-container slides-per-view="2" speed="500" loop="true" autoplay="true" css-mode="true"
                    class="swiper-container-second flex lg:hidden flex-row gap-12 pb-24">
                    <swiper-slide class="">
                        <img src="/images/microsoft_home.png" alt="" />
                    </swiper-slide>
                    <swiper-slide class="pl-16">
                        <img src="/images/2-google-logo.png" alt="" />
                    </swiper-slide>
                    <swiper-slide class="pl-16">
                        <img src="/images/3-logo.png" alt="" />
                    </swiper-slide>
                    <swiper-slide class="">
                        <img src="/images/4-firstep_lg.png" alt="" />
                    </swiper-slide>
                    <swiper-slide class="pl-16">
                        <img src="/images/garda_home.png" alt="" />
                    </swiper-slide>
                    <swiper-slide class="pl-16">
                        <img src="/images/graychapel_home.png" alt="" />
                    </swiper-slide>
                    <swiper-slide class="pl-16">
                        <img src="/images/rif_trust_home.png" alt="" />
                    </swiper-slide>
                </swiper-container>
                {{-- MOBILE PARTNER END --}}

                {{-- PC PARTNER START --}}
                <swiper-container slides-per-view="3" speed="500" loop="true" autoplay="true" css-mode="true"
                    class="swiper-container-second hidden lg:flex flex-row gap-12 pb-24">
                    <swiper-slide class="">
                        <img src="/images/microsoft_home.png" alt="" />
                    </swiper-slide>

                    <swiper-slide class="pl-16">
                        <img src="/images/2-google-logo.png" alt="" />
                    </swiper-slide>

                    <swiper-slide class="pl-16">
                        <img src="/images/3-logo.png" alt="" />
                    </swiper-slide>

                    <swiper-slide class="">
                        <img src="/images/4-firstep_lg.png" alt="" />
                    </swiper-slide>

                    <swiper-slide class="pl-16">
                        <img src="/images/garda_home.png" alt="" />
                    </swiper-slide>

                    <swiper-slide class="pl-16">
                        <img src="/images/graychapel_home.png" alt="" />
                    </swiper-slide>

                    <swiper-slide class="pl-16">
                        <img src="/images/rif_trust_home.png" alt="" />
                    </swiper-slide>
                </swiper-container>
                {{-- PC PARTNER END --}}
            </div>
        </div>

        {{-- VOLUNTEER START --}}
        <div class="flex flex-col lg:flex-row items-center justify-center my-12 lg:my-24 gap-10">
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

                <button
                    class="text-white font-normal w-[308px] h-[54px] pt-[15px] pr-[10px] pb-[15px] pl-[10px] rounded-full bg-[#25A8D6] montserrat-light text-lg leading-[24.38px] tracking-wider text-center md:text-xl md:leading-[26px] lg:text-xl lg:leading-[28px] xl:text-xl xl:leading-[30px] mt-10">
                    VOLUNTEER NOW
                </button>
            </div>
        </div>
        {{-- VOLUNTEER END --}}

        {{-- AMBASSADORS MODAL START --}}
        <div id="ambassador-modal"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-start justify-center lg:p-20 px-8 py-10 overflow-y-scroll hidden">
            @isset($selectedAmbassador)
                <x-detail :name="$selectedAmbassador['name']" :content="$selectedAmbassador['content']" :image="$selectedAmbassador['image']" :link="$selectedAmbassador['link']" />
            @endisset
        </div>
        {{-- AMBASSADORS MODAL END --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ambassadors = @json($ambassadors);
            const modal = document.getElementById('ambassador-modal');

            document.querySelectorAll('.grid img').forEach(img => {
                img.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    const ambassador = ambassadors[index];

                    console.log(ambassador)

                    @php
                        $selectedAmbassador = isset($ambassadors[$index]) ? $ambassadors[$index] : null;
                    @endphp

                    modal.classList.remove('hidden');
                });
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>

</x-guest-layout>
