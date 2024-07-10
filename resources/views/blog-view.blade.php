<x-guest-layout title="Special Foundation - {{ $post->title }}" page="blog">

    @push('head')
        <!-- Primary Meta Tags -->
        <meta name="title" content="{{ $post->title }}" />
        <meta name="description" content="{{ $post->summary }}" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://thespecialfoundation.org/blog/{{ $post->id }}" />
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ $post->summary }}" />
        <meta property="og:image" content="{{ Storage::url($post->featured_image) }}" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://thespecialfoundation.org/blog/{{ $post->id }}" />
        <meta property="twitter:title" content="{{ $post->title }}" />
        <meta property="twitter:description" content="{{ $post->summary }}" />
        <meta property="twitter:image" content="{{ Storage::url($post->featured_image) }}" />
    @endpush

    <div class="relative bg-cover bg-center h-40"
        style="background-image: url('{{ Storage::url($post->featured_image) }}');">
        <div class="h-full bg-[#26225F]/90">

        </div>
    </div>

    {{-- BLOG TITLE START --}}
    <div class="w-full flex items-center justify-center p-8 lg:p-10">
        <h1
            class="font-montserrat text-4xl font-extrabold leading-none text-center md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:text-7xl xl:leading-none text-[#25A8D6] my-12 xl:w-[60%]">
            {{ $post->title }}
        </h1>
    </div>
    {{-- BLOG TITLE END --}}

    <div class="w-full flex flex-col p-8 lg:p-20 gap-14">
        {{-- BLOG AUTHOR & SHARE START --}}
        <div class="w-full flex flex-col lg:flex-row items-center justify-between bg-[#26225F] px-6 lg:px-16 py-4">
            <div>
                <h3
                    class="montserrat-thin text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9 text-white">
                    Written by <span
                        class="poppins-bold text-base font-black leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9 text-white">
                        {{ $post->user->name }}
                    </span>

                </h3>

            </div>

            <div class="flex items-center justify-center gap-2">
                <p
                    class="font-montserrat text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9 text-white">
                    Share |
                </p>
                <div class="flex items-center justify-center gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                        target="_blank">
                        <img src="/images/blog_facebook.svg" alt="FaceBook Logo">
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($post->title) }}"
                        target="_blank">
                        <img src="/images/blog_twitter.svg" alt="Twitter Logo">
                    </a>
                    <a href="https://www.instagram.com/?url={{ urlencode(Request::url()) }}" target="_blank">
                        <img src="/images/blog_instagram.svg" alt="Instagram Logo">
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::url()) }}&title={{ urlencode($post->title) }}&summary={{ urlencode($post->excerpt) }}"
                        target="_blank">
                        <img src="/images/blog_linkedin.svg" alt="Linkedin Logo">
                    </a>
                </div>
            </div>

        </div>
        {{-- BLOG AUTHOR & SHARE START --}}

        {{-- BLOG CONTENT START --}}
        <section
            class="montserrat-light text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9">
            {!! $post->body !!}
        </section>
        {{-- BLOG CONTENT END --}}
    </div>

    <div class="flex flex-col items-center justify-center p-8 lg:p-20 bg-[#25A8D6]">
        <h2
            class="font-montserrat text-4xl font-extrabold leading-none text-center md:text-5xl md:leading-tight lg:text-6xl lg:leading-none xl:text-7xl xl:leading-none mb-8 lg:mb-12 text-[#26225F]">
            You may also like
        </h2>

        <div class="w-full flex flex-col lg:flex-row items-center justify-around gap-6 lg:gap-0">
            @foreach ($similar_posts as $similar_post)
                <div class="flex flex-col bg-[#26225F] w-[380px]">
                    <div>
                        <img class="w-[380px]" src="{{ Storage::url($similar_post->featured_image) }}"
                            alt="{{ $similar_post->title }}" />
                    </div>
                    <div class="mx-12 pt-8 pb-5 text-white">
                        <h1 class="pb-4 leading-[20px] poppins-semibold">
                            {{ $similar_post->title }}
                        </h1>
                        <p class="poppins-light text-xs pb-4">
                            {{ \Carbon\Carbon::parse($similar_post->created_at)->format('F d, Y') }}
                        </p>
                        <a class="text-[#25A8D6] text-[8px]" href="/blog/{{ $similar_post->id }}">READ MORE</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</x-guest-layout>
