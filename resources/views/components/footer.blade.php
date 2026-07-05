<div class="bg-[#26225F]">
    <div class="px-6 sm:px-10 lg:px-20 py-16 lg:py-20 text-white">

        <!-- MAIN FOOTER GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-12 gap-x-8 pb-16">

            <!-- About -->
            <div class="flex flex-col md:col-span-2 lg:col-span-4 lg:pr-10">
                <h1 class="montserrat-semibold pb-6 uppercase tracking-wider text-lg">About Us</h1>
                <img class="w-32 sm:w-40 pb-6" src="/images/about-us-logo.png" alt="About Us" />
                <p class="montserrat-extralight text-sm leading-relaxed text-gray-200">
                    The Special Foundation is a privately funded social
                    impact organization focused on building Africa’s
                    next set of Leaders by refining their minds through
                    education.
                </p>
            </div>

            <!-- Featured Blogs -->
            <div class="flex flex-col lg:col-span-2">
                <h1 class="montserrat-semibold pb-6 uppercase tracking-wider text-lg">Featured Blogs</h1>
                <div class="flex flex-col gap-5">
                    @foreach ($featured_blogs as $blog)
                        <a href="/blog/{{ $blog->id }}" class="group block">
                            <p class="montserrat-extralight text-sm leading-tight pb-1.5 group-hover:text-[#25A8D6] transition-colors">
                                {{ $blog->title }}
                            </p>
                            <p class="montserrat-thin text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Accreditations -->
            <div class="flex flex-col lg:col-span-2">
                <h1 class="montserrat-semibold pb-6 uppercase tracking-wider text-lg">Accreditations</h1>
                <div class="flex flex-col gap-4 text-sm">
                    @foreach ($accreditations as $accreditation)
                        <div class="flex items-center gap-4 group">
                            <div class="bg-white rounded p-1.5 transition-transform group-hover:scale-105">
                                <img class="w-8 h-8 object-contain"
                                     src="{{ asset('storage/' . $accreditation->image) }}"
                                     alt="{{ $accreditation->name }}">
                            </div>
                            <p class="montserrat-extralight leading-snug text-gray-200">
                                {{ $accreditation->name }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Media Mentions -->
            <div class="flex flex-col lg:col-span-2">
                <h1 class="montserrat-semibold pb-6 uppercase tracking-wider text-lg">Media Mentions</h1>
                <div class="flex flex-col gap-4 text-sm">
                    @foreach ($media_mentions as $mention)
                        <a href="{{ $mention->url }}"
                           target="_blank"
                           class="montserrat-extralight text-gray-200 hover:text-[#25A8D6] transition-colors block break-words leading-relaxed">
                            {!! $mention->title !!}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Contact -->
            <div class="flex flex-col lg:col-span-2">
                <h1 class="montserrat-semibold pb-6 uppercase tracking-wider text-lg">Contact Details</h1>
                <div class="flex flex-col gap-4">
                    <a href="mailto:info@thespecialfoundation.org" class="montserrat-extralight text-sm text-gray-200 hover:text-[#25A8D6] transition-colors flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span class="break-all">info@thespecialfoundation.org</span>
                    </a>
                    <a href="tel:+2349063444444" class="montserrat-extralight text-sm text-gray-200 hover:text-[#25A8D6] transition-colors flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>+234 906 344 4444</span>
                    </a>
                    <div class="montserrat-extralight text-sm text-gray-200 leading-relaxed flex items-start gap-2">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Plot 28, Daniyan Natalia Street,<br>Lekki Phase 1,<br>Lagos State.</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- FOOTER BOTTOM -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 pt-8 border-t border-white/20">

            <!-- Copyright -->
            <div class="flex items-center gap-3 text-sm text-center md:text-left">
                <img class="w-4 h-4 opacity-70" src="/images/copywright.png" alt="Copyright" />
                <p class="montserrat-extralight text-gray-300">
                    {{ date('Y') }} The Special Youth Foundation. All Rights Reserved
                </p>
            </div>

            <!-- Socials -->
            <div class="flex items-center gap-4 sm:gap-6">
                <a href="https://www.facebook.com/TSFNigeria/" target="_blank" rel="noopener noreferrer" class="hover:-translate-y-1 transition-transform duration-300">
                    <img class="w-7 h-7 object-contain" src="/images/Facebook.png" alt="Facebook" />
                </a>
                <a href="https://x.com/thespecialfoun1" target="_blank" rel="noopener noreferrer" class="hover:-translate-y-1 transition-transform duration-300">
                    <img class="w-7 h-7 object-contain" src="/images/TwitterX.png" alt="Twitter X" />
                </a>
                <a href="https://www.instagram.com/thespecialfoundation/" target="_blank" rel="noopener noreferrer" class="hover:-translate-y-1 transition-transform duration-300">
                    <img class="w-7 h-7 object-contain" src="/images/Instagram.png" alt="Instagram" />
                </a>
                <a href="https://www.linkedin.com/company/the-special-youth-leadership-foundation/?originalSubdomain=ng" target="_blank" rel="noopener noreferrer" class="hover:-translate-y-1 transition-transform duration-300">
                    <img class="w-7 h-7 object-contain" src="/images/LinkedIn.png" alt="LinkedIn" />
                </a>
                <a href="https://www.youtube.com/channel/UCyd16DepueNAALGGNu1fJkw" target="_blank" rel="noopener noreferrer" class="hover:-translate-y-1 transition-transform duration-300">
                    <img class="w-7 h-7 object-contain" src="/images/YouTube.png" alt="YouTube" />
                </a>
            </div>

        </div>

    </div>
</div>