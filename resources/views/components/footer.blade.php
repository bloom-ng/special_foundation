<div class="bg-[#26225F]">
            <div class="mx-10 lg:mx-20 py-20 text-white">
                <div class="flex flex-col lg:flex-row pb-12">
                    <div class="flex flex-row gap-14 pb-12">
                        <div class="basis-1/2 lg:basis-1/4 flex flex-col">
                            <h1 class="montserrat-semibold pb-9">About Us</h1>
                            <img class="md:w-44 w-24 pb-7" src="/images/about-us-logo.png" alt="" />
                            <p class="montserrat-extralight text-xs leading-[18px]">
                                The Special Foundation is a privately funded social
                                impact organization focused on building Africa’s
                                next set of Leaders by refining their minds through
                                education.
                            </p>
                        </div>
                        <div class="basis-1/2 lg:basis-1/4 flex flex-col">
                            <h1 class="montserrat-semibold pb-9">Featured Blogs</h1>
                            @foreach ($featured_blogs as $blog)
                                <a href="/blog/{{ $blog->id }}" class="pb-4 cursor-pointer">
                                    <p class="montserrat-extralight text-xs leading-[18px] pb-3">
                                        {{ $blog->title }}
                                    </p>
                                    <p class="montserrat-thin text-[9px] leading-[18px]">
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="basis-1/2 lg:basis-1/4 flex flex-col">
                        <div>
                            <h1 class="montserrat-semibold pb-9">Media Mentions Section</h1>
                            <div class="inline-flex items-center gap-1 max-w-full montserrat-extralight text-xs leading-[18px] pb-3">
                                <a href="https://youtu.be/Uj8_jmI8r4M?si=dI7HLWK6thLq5vDz" target="_blank" class="cursor-pointer hover:underline shrink-0" aria-label="Open Kaleidoscope on YouTube">
                                    <span class="flex-1 min-w-0 truncate">Kaleidoscope (Channels TV)</span>
                                </a>
                            </div>
                            <div class="inline-flex items-center gap-1 max-w-full montserrat-extralight text-xs leading-[18px] pb-3">
                                <a href="https://youtu.be/BXHs5Osrr1M?si=dUhOIeawX6VHvjjH" target="_blank" class="cursor-pointer hover:underline shrink-0" aria-label="Open Eye Witness Report on YouTube">
                                    <span class="flex-1 min-w-0 truncate">Eye Witness Report (Channels TV)</span>
                                </a>
                            </div>
                            <div class="flex flex-row gap-1">
                                <a href="https://nairametrics.com/2025/05/21/the-special-foundation-hosts-2025-summit-champions-a-future-of-inclusive-education/" target="_blank" class="pb-4 cursor-pointer hover:underline">
                                    <p class="montserrat-extralight text-xs leading-[18px] pb-3">
                                        Nairametrics
                                    </p>
                                </a>
                            </div>  
                            <div class="flex flex-row gap-1">
                                <a href="https://punchng.com/foundation-seeks-urgent-education-reforms/?amp" target="_blank" class="pb-4 cursor-pointer hover:underline">
                                    <p class="montserrat-extralight text-xs leading-[18px] pb-3">
                                        PunchNG
                                    </p>
                                </a>
                            </div>  
                            <div class="flex flex-row gap-1">
                                <a href="https://thesun.ng/the-special-foundation-hosts-partners-reiterates-commitment-to-quality-education/" target="_blank" class="pb-4 cursor-pointer hover:underline">
                                    <p class="montserrat-extralight text-xs leading-[18px] pb-3">
                                        The Sun NG
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row gap-14">
                        <div class="basis-1/2 lg:basis-1/4 flex flex-col">
                            <h1 class="montserrat-semibold pb-9">Contact Details</h1>
                            <p class="montserrat-extralight text-xs leading-[18px] pb-6">
                                info@thespecialfoundation.org
                            </p>
                            <p class="montserrat-extralight text-xs leading-[18px] pb-6">
                                +234 906 344 4444
                            </p>
                            <p class="montserrat-extralight text-xs leading-[18px] pb-6">
                                Plot 28, Daniyan Natalia Street, lekki phase one, Lagos State.
                            </p>
                        </div>
                        <div class="basis-1/2 lg:basis-1/4 flex flex-col">
                            <h1 class="montserrat-semibold pb-9">Downloads</h1>
                            <div class="flex flex-col gap-6 montserrat-extralight text-xs leading-[18px]">
                                @foreach ($downloads as $download)
                                    <a href="{{ Storage::url($download->url) }}"
                                        target="_blank">{{ $download->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between">
                    <div class="flex flex-row gap-2 montserrat-extralight items-center text-xs">
                        <img class="w-4 h-4" src="/images/copywright.png" alt="" />
                        <p>
                            2024 The Special Youth Foundation. All Rights
                            Reserved
                        </p>
                    </div>
                    <div class="flex flex-row gap-4">
                        <div>
                            <a href="https://www.facebook.com/TSFNigeria/"><img class="w-9"
                                    src="/images/Facebook.png" alt="Facebook" /></a>
                        </div>
                        <div>
                            <a href="https://x.com/thespecialfoun1"><img class="w-9" src="/images/TwitterX.png"
                                    alt="Twitter | X" /></a>
                        </div>
                        <div>
                            <a href="https://www.instagram.com/thespecialfoundation/"><img class="w-9"
                                    src="/images/Instagram.png" alt="Instagram" /></a>
                        </div>
                        <div>
                            <a
                                href="https://www.linkedin.com/company/the-special-youth-leadership-foundation/?originalSubdomain=ng"><img
                                    class="w-9" src="/images/LinkedIn.png" alt="Linkedin" /></a>
                        </div>
                        <div>
                            <a href="https://www.youtube.com/channel/UCyd16DepueNAALGGNu1fJkw"><img class="w-9"
                                    src="/images/YouTube.png" alt="Youtube" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
