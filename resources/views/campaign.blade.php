<x-guest-layout :title="$campaign->title" page="campaign">

    {{-- 🔵 HEADER / HERO --}}
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ $campaign->banner_image ? asset("storage/" . $campaign->banner_image) : asset("/images/rectangle-background.png") }}');">

        <div class="h-full flex items-center justify-center">
            <h1 class="text-[30px] lg:text-[48px] font-extrabold text-[#25A8D6] text-center">
                {{ $campaign->title }}
            </h1>
        </div>
    </div>

    {{-- 🔵 COUNTDOWN --}}
    @if ($campaign->show_countdown && $campaign->countdown_date)
        <div class="text-center py-10">
            <div id="countdown" class="text-3xl lg:text-4xl font-bold text-[#25A8D6]"></div>
        </div>

        <script>
            var countDownDate = new Date("{{ $campaign->countdown_date }}").getTime();

            setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;

                var d = Math.floor(distance / (1000 * 60 * 60 * 24));
                var h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var s = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML =
                    d + "d " + h + "h " + m + "m " + s + "s";
            }, 1000);
        </script>
    @endif

    {{-- 🔵 HERO CONTENT --}}
    <div class="p-8 lg:p-20">
        <div class="flex flex-col-reverse lg:flex-row items-center gap-12">

            {{-- TEXT --}}
            <div class="w-full lg:w-[55%]">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-[#25A8D6]">
                    {{ $campaign->hero_title }}
                </h2>

                <p class="text-lg mt-6 border-l-[10px] border-[#25A8D6] pl-5">
                    {!! $campaign->hero_text !!}
                </p>

                {{-- CTA --}}
                <div class="flex flex-wrap gap-4 mt-8">
                    @if ($campaign->primary_cta_text)
                        <a href="{{ $campaign->primary_cta_link }}"
                            class="bg-[#25A8D6] text-white px-6 py-3 rounded-full">
                            {{ $campaign->primary_cta_text }}
                        </a>
                    @endif

                    @if ($campaign->secondary_cta_text)
                        <a href="{{ $campaign->secondary_cta_link }}"
                            class="border border-[#25A8D6] text-[#25A8D6] px-6 py-3 rounded-full">
                            {{ $campaign->secondary_cta_text }}
                        </a>
                    @endif
                </div>
            </div>

            {{-- IMAGE --}}
            <div class="w-full lg:w-[45%]">
                @if ($campaign->hero_image)
                    <img src="{{ asset("storage/" . $campaign->hero_image) }}"
                        class="rounded-2xl shadow-lg w-full">
                @endif
            </div>

        </div>
    </div>

    {{-- 🔵 STATS --}}
    @if (!empty($campaign->stats))
        <div class="px-8 lg:px-20 pb-20">
            <div class="grid md:grid-cols-3 gap-6">

                @foreach ($campaign->stats as $stat)
                    <div class="bg-[#F5FAFD] border border-[#25A8D6] p-8 rounded-xl text-center">

                        <div class="flex items-center justify-center text-[#26225F]">

                            <h3 class="montserrat-bold text-3xl md:text-4xl ">
                                {{ $stat["number"] ?? "" }}
                            </h3>

                            <span class="montserrat-bold text-3xl md:text-4xl ml-1">
                                +
                            </span>

                        </div>

                        <div class="montserrat-thin font-normal w-inherit">
                            {{ $stat["label"] ?? "" }}
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    @endif

    {{-- 🔵 SECTIONS --}}
    @if ($campaign->sections)
        <div class="px-8 lg:px-20 space-y-16">

            @foreach ($campaign->sections as $section)
                <div class="max-w-4xl">

                    @if (!empty($section["title"]))
                        <h3 class="text-2xl font-bold text-[#26225F] mb-4">
                            {{ $section["title"] }}
                        </h3>
                    @endif

                    @if (!empty($section["content"]))
                        <div class="text-lg leading-relaxed">
                            {!! $section["content"] !!}
                        </div>
                    @endif

                </div>
            @endforeach

        </div>
    @endif

    {{-- 🔵 TESTIMONIAL --}}
    @if ($campaign->testimonial)
        <div class="px-8 lg:px-20 my-20">
            <div class="bg-[#26225F] text-white p-10 rounded-2xl text-center italic text-lg">
                “{!! $campaign->testimonial !!}”
            </div>
        </div>
    @endif

    {{-- 🔵 FORM --}}
    <div class="bg-[#25A8D6] px-8 lg:px-20 py-20 text-white">

        <div class="max-w-2xl">
            <h2 class="text-3xl font-bold mb-6">
                Get Involved
            </h2>

            <form method="POST" action="/leads" class="flex flex-col space-y-6">
                @csrf

                <input
                    class="h-[60px] px-6 rounded-full text-black"
                    type="text" name="name" placeholder="Full Name" required>

                <div class="flex flex-col lg:flex-row gap-4">
                    <input
                        class="w-full h-[60px] px-6 rounded-full text-black"
                        type="email" name="email" placeholder="Email Address" required>

                    <input
                        class="w-full h-[60px] px-6 rounded-full text-black"
                        type="text" name="phone" placeholder="Phone Number" required>
                </div>

                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                <button
                    class="bg-[#26225F] py-4 rounded-full font-bold">
                    SUBMIT
                </button>

            </form>
        </div>

    </div>

</x-guest-layout>