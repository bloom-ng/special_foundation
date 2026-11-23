<x-guest-layout :title="'Ways to Support - The Special Foundation'" :page="'get_involved'">

    {{-- HERO --}}
    <div class="w-full bg-[#26225F] px-5 lg:px-20 py-16 lg:py-24">
        <div class="max-w-4xl">
            <h1 class="montserrat-bold text-white text-[32px] lg:text-[52px] leading-[40px] lg:leading-[60px]">
                Every child is your child. Here&rsquo;s how to show it.
            </h1>
            <p class="montserrat-light text-white/90 text-base lg:text-xl mt-6">
                At The Special Foundation, we believe every child deserves the chance to dream.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mt-10">
                <a href="#for-individuals" data-track="jump-individuals"
                    class="inline-block text-center rounded-full bg-[#25A8D6] px-8 py-3 montserrat-semibold text-white transition hover:bg-[#1B7FA6]">
                    For Individuals
                </a>
                <a href="#for-businesses" data-track="jump-businesses"
                    class="inline-block text-center rounded-full border-2 border-white px-8 py-3 montserrat-semibold text-white transition hover:bg-white hover:text-[#26225F]">
                    For Businesses and Groups
                </a>
            </div>
        </div>
    </div>

    {{-- CARD SECTIONS --}}
    @foreach ($groups as $group => $cards)
        <div id="{{ $group === \App\Models\SupportOption::GROUP_INDIVIDUALS ? 'for-individuals' : 'for-businesses' }}"
            class="w-full px-5 lg:px-20 py-16 {{ $loop->odd ? 'bg-white' : 'bg-[#F7F9FC]' }}">
            <h2 class="montserrat-bold text-[#26225F] text-[28px] lg:text-[38px] leading-tight mb-10">
                {{ \App\Models\SupportOption::getGroups()[$group] ?? $group }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach ($cards as $card)
                    <div class="flex flex-col overflow-hidden rounded-2xl bg-white border border-[#E6E6EF] shadow-sm transition hover:shadow-lg">
                        @if ($card->image)
                            <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->title }}"
                                class="h-48 w-full object-cover" loading="lazy">
                        @else
                            <div class="flex h-48 w-full items-center justify-center bg-[#F2F4FA] text-[#A9AFC3]">
                                <span class="montserrat-semibold text-xs uppercase tracking-widest">Image to follow</span>
                            </div>
                        @endif

                        <div class="flex flex-1 flex-col p-6">
                            <h3 class="montserrat-bold text-[#26225F] text-xl">{{ $card->title }}</h3>
                            <p class="montserrat-light mt-3 flex-1 text-sm leading-relaxed text-[#4B4B5A]">
                                {{ $card->body }}
                            </p>

                            <div class="mt-6 flex flex-col gap-2">
                                <a href="{{ $card->button_url }}"
                                    data-track="{{ $card->track_id }}"
                                    @if (\Illuminate\Support\Str::startsWith($card->button_url, 'http')) target="_blank" rel="noopener noreferrer" @endif
                                    class="inline-block rounded-full bg-[#25A8D6] px-6 py-3 text-center montserrat-semibold text-sm text-white transition hover:bg-[#1B7FA6]">
                                    {{ $card->button_label }}
                                </a>

                                @if ($card->secondary_label && $card->secondary_url)
                                    <a href="{{ $card->secondary_url }}"
                                        data-track="{{ $card->track_id }}-secondary"
                                        @if (\Illuminate\Support\Str::startsWith($card->secondary_url, 'http')) target="_blank" rel="noopener noreferrer" @endif
                                        class="inline-block rounded-full border border-[#25A8D6] px-6 py-3 text-center montserrat-semibold text-sm text-[#25A8D6] transition hover:bg-[#25A8D6] hover:text-white">
                                        {{ $card->secondary_label }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    {{-- OTHER WAYS TO GIVE --}}
    <div id="other-ways" class="w-full px-5 lg:px-20 py-16 bg-white">
        <h2 class="montserrat-bold text-[#26225F] text-[28px] lg:text-[38px] leading-tight mb-8">
            Other ways to give
        </h2>
        <x-bank-details />
    </div>

    {{-- FUNDRAISER TOOLKIT --}}
    <div id="fundraiser-toolkit" class="w-full px-5 lg:px-20 py-16 bg-[#F7F9FC]">
        <h2 class="montserrat-bold text-[#26225F] text-[28px] lg:text-[38px] leading-tight mb-3">
            Fundraiser toolkit
        </h2>
        <p class="montserrat-light text-[#4B4B5A] mb-8 max-w-2xl">
            Everything you need to run your own fundraiser, from a step-by-step guide to ready-made
            graphics you can post.
        </p>

        <div class="flex flex-col sm:flex-row gap-4">
            @php
                $toolkitPdf = config('support.toolkit_pdf');
                $socialPack = config('support.social_templates');
            @endphp

            <a @if ($toolkitPdf) href="{{ $toolkitPdf }}" target="_blank" rel="noopener noreferrer" @endif
                data-track="download-toolkit"
                @class([
                    'inline-block rounded-full px-8 py-3 text-center montserrat-semibold transition',
                    'bg-[#25A8D6] text-white hover:bg-[#1B7FA6]' => $toolkitPdf,
                    'bg-[#E6E6EF] text-[#8A8AA0] cursor-not-allowed' => ! $toolkitPdf,
                ])>
                Download the toolkit (PDF)
            </a>
        </div>

        @if (! $toolkitPdf)
            <p class="montserrat-light text-xs text-[#8A8AA0] mt-4">
                Coming soon.
            </p>
        @endif
    </div>

    {{-- CONTACT STRIP / ENQUIRY FORM --}}
    <div id="enquiry" class="w-full px-5 lg:px-20 py-16 bg-[#26225F]">
        <div class="max-w-3xl">
            <h2 class="montserrat-bold text-white text-[28px] lg:text-[38px] leading-tight">
                Have an idea? Talk to us
            </h2>
            <p class="montserrat-light text-white/85 mt-3">
                Tell us what you have in mind and a member of our team will be in touch.
            </p>
        </div>

        @if (session('success'))
            <div class="mt-8 max-w-3xl rounded-xl border border-green-300 bg-green-50 px-5 py-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-8 max-w-3xl rounded-xl border border-red-300 bg-red-50 px-5 py-4 text-red-800">
                <p class="montserrat-semibold">Please check the following:</p>
                <ul class="mt-2 list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('ways.to.support.store') }}"
            class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-2 max-w-5xl">
            @csrf

            <div>
                <label for="full_name" class="block montserrat-semibold text-sm text-white mb-2">Full name *</label>
                <input id="full_name" name="full_name" type="text" required value="{{ old('full_name') }}"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
            </div>

            <div>
                <label for="email" class="block montserrat-semibold text-sm text-white mb-2">Email *</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
            </div>

            <div>
                <label for="phone" class="block montserrat-semibold text-sm text-white mb-2">Phone (WhatsApp)</label>
                <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
            </div>

            <div>
                <label for="country" class="block montserrat-semibold text-sm text-white mb-2">Country</label>
                <input id="country" name="country" type="text" value="{{ old('country') }}"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
            </div>

            <div>
                <label for="support_type" class="block montserrat-semibold text-sm text-white mb-2">How would you like to support? *</label>
                <select id="support_type" name="support_type" required
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
                    @foreach ($supportTypes as $label)
                        <option value="{{ $label }}"
                            {{ old('support_type', $selectedType) === $label ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="occasion_date" class="block montserrat-semibold text-sm text-white mb-2">Occasion or event date</label>
                <input id="occasion_date" name="occasion_date" type="date" value="{{ old('occasion_date') }}"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
            </div>

            <div class="md:col-span-2">
                <label for="fundraising_goal" class="block montserrat-semibold text-sm text-white mb-2">Fundraising goal</label>
                <input id="fundraising_goal" name="fundraising_goal" type="text" value="{{ old('fundraising_goal') }}"
                    placeholder="For example ₦500,000"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">
            </div>

            <div class="md:col-span-2">
                <label for="message" class="block montserrat-semibold text-sm text-white mb-2">Message</label>
                <textarea id="message" name="message" rows="5"
                    class="w-full rounded-lg border-0 px-4 py-3 text-[#26225F] focus:ring-2 focus:ring-[#25A8D6]">{{ old('message') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <button type="submit" data-track="submit-enquiry"
                    class="rounded-full bg-[#25A8D6] px-10 py-3 montserrat-semibold text-white transition hover:bg-[#1B7FA6]">
                    Send
                </button>
            </div>
        </form>
    </div>

    <script>
        // Report button clicks to whatever analytics tool is installed.
        // Nothing is sent until TSF confirms which tool to use.
        document.addEventListener('click', function (e) {
            const el = e.target.closest('[data-track]');
            if (!el) return;

            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: 'ways_to_support_click',
                item: el.getAttribute('data-track'),
            });
        });

        // Open the form with a support type already chosen: ?type=fundraiser
        document.addEventListener('DOMContentLoaded', function () {
            if (window.location.hash === '#enquiry') {
                document.getElementById('enquiry')?.scrollIntoView();
            }
        });
    </script>

</x-guest-layout>
