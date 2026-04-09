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