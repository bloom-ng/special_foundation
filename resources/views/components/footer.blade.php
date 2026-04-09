<div class="bg-[#26225F]">
    <div class="px-6 sm:px-10 lg:px-20 py-16 lg:py-20 text-white">

        <div class="flex flex-col w-full lg:flex-row lg:gap-10 pb-12">

            <!-- FIRST BLOCK -->
            <div class="flex flex-col sm:flex-row w-full lg:w-auto gap-10 pb-10">

                <!-- About -->
                <div class="w-full sm:w-1/2 lg:w-auto md:min-w-[120px] flex flex-col">
                    <h1 class="montserrat-semibold pb-6">About Us</h1>
                    <img class="w-28 sm:w-36 pb-5" src="/images/about-us-logo.png" alt="" />
                    <p class="montserrat-extralight text-sm leading-6">
                        The Special Foundation is a privately funded social
                        impact organization focused on building Africa’s
                        next set of Leaders by refining their minds through
                        education.
                    </p>
                </div>

                <!-- Featured Blogs -->
                <div class="w-full sm:w-1/2 lg:w-auto md:min-w-[120px] flex flex-col">
                    <h1 class="montserrat-semibold pb-6">Featured Blogs</h1>
                    @foreach ($featured_blogs as $blog)
                        <a href="/blog/{{ $blog->id }}" class="pb-4 block">
                            <p class="montserrat-extralight text-sm leading-5 pb-1">
                                {{ $blog->title }}
                            </p>
                            <p class="montserrat-thin text-xs">
                                {{ \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') }}
                            </p>
                        </a>
                    @endforeach
                </div>

            </div>

            <!-- SECOND BLOCK -->
            <div class="flex flex-col sm:flex-row w-full lg:w-auto gap-10 pb-10">

                <!-- Accreditations -->
                <div class="w-full sm:w-1/2 lg:w-auto md:max-w-[300px] flex flex-col">
                    <h1 class="montserrat-semibold pb-6">Accreditations</h1>
                    <div class="flex flex-col gap-3 text-sm">
                        @foreach ($accreditations as $accreditation)
                            <div class="flex items-center gap-3">
                                <img class="w-8 h-8"
                                     src="{{ asset('storage/' . $accreditation->image) }}"
                                     alt="{{ $accreditation->name }}">
                                <p class="montserrat-extralight">
                                    {{ $accreditation->name }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

               <!-- Media Mentions -->
<div class="w-full sm:w-1/2 lg:w-1/4 md:min-w-[250px] flex flex-col">
    <h1 class="montserrat-semibold pb-6">Media Mentions Section</h1>

    <div class="flex flex-col gap-3 text-sm">
        @foreach ($media_mentions as $mention)
            <a href="{{ $mention->url }}"
               target="_blank"
               class="montserrat-extralight hover:underline block break-words">
                {!! $mention->title !!}
            </a>
        @endforeach
    </div>
</div>

            </div>

            <!-- THIRD BLOCK -->
            <div class="flex flex-col sm:flex-row gap-10 w-full">

                <!-- Contact -->
                <div class="w-full sm:w-1/2 lg:w-auto flex flex-col">
                    <h1 class="montserrat-semibold pb-6">Contact Details</h1>
                    <p class="montserrat-extralight text-sm pb-4">
                        info@thespecialfoundation.org
                    </p>
                    <p class="montserrat-extralight text-sm pb-4">
                        +234 906 344 4444
                    </p>
                    <p class="montserrat-extralight text-sm pb-4">
                        Plot 28, Daniyan Natalia Street, Lekki Phase 1, Lagos State.
                    </p>
                </div>

                <!-- Downloads -->
                <div class="w-full sm:w-1/2 lg:w-auto flex flex-col">
                    <h1 class="montserrat-semibold pb-6">Downloads</h1>
                    <div class="flex flex-col gap-3 text-sm montserrat-extralight">
                        @foreach ($downloads as $download)
                            <a href="{{ Storage::url($download->url) }}"
                               target="_blank"
                               class="hover:underline">
                                {{ $download->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

        <!-- FOOTER BOTTOM -->
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6 pt-6 border-t border-white/20">

            <!-- Copyright -->
            <div class="flex items-center gap-2 text-sm text-center lg:text-left">
                <img class="w-4 h-4" src="/images/copywright.png" alt="" />
                <p class="montserrat-extralight">
                    2024 The Special Youth Foundation. All Rights Reserved
                </p>
            </div>

            <!-- Socials -->
            <div class="flex items-center gap-4">
                <a href="https://www.facebook.com/TSFNigeria/">
                    <img class="w-8" src="/images/Facebook.png" alt="Facebook" />
                </a>
                <a href="https://x.com/thespecialfoun1">
                    <img class="w-8" src="/images/TwitterX.png" alt="Twitter X" />
                </a>
                <a href="https://www.instagram.com/thespecialfoundation/">
                    <img class="w-8" src="/images/Instagram.png" alt="Instagram" />
                </a>
                <a href="https://www.linkedin.com/company/the-special-youth-leadership-foundation/?originalSubdomain=ng">
                    <img class="w-8" src="/images/LinkedIn.png" alt="LinkedIn" />
                </a>
                <a href="https://www.youtube.com/channel/UCyd16DepueNAALGGNu1fJkw">
                    <img class="w-8" src="/images/YouTube.png" alt="YouTube" />
                </a>
            </div>

        </div>

    </div>
</div>