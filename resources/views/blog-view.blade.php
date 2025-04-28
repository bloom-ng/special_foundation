<x-guest-layout title="Special Foundation - {{ $post->title }}" page="blog">

    @push('head')
        @php
            $imagePath = Storage::url($post->featured_image);
            $encodedImagePath = preg_replace_callback(
                '/[^\/]+/',
                function ($matches) {
                    return rawurlencode($matches[0]);
                },
                $imagePath,
            );
        @endphp
        <!-- Primary Meta Tags -->
        <meta name="title" content="{{ $post->title }}" />
        <meta name="description" content="{{ $post->summary }}" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://thespecialfoundation.org/blog/{{ $post->slug }}" />
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ $post->summary }}" />
        {{-- <meta property="og:image" content="{{  url( $encodedImagePath )}}" /> --}}
        <meta property="og:image" content="{{ asset('images/og_graph.png') }}" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://thespecialfoundation.org/blog/{{ $post->slug }}" />
        <meta property="twitter:title" content="{{ $post->title }}" />
        <meta property="twitter:description" content="{{ $post->summary }}" />
        {{-- <meta property="twitter:image" content="{{ url($encodedImagePath) }}" /> --}}
        <meta property="twitter:image" content="{{ asset('images/og_graph.png') }}" />
    @endpush

    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ Storage::url($post->featured_image) }}');">
        <div class="h-full">

        </div>
    </div>

    @if (Request::query('preview'))
        <div class="fixed top-0 left-0 w-full bg-orange-500 text-white p-8 text-center">
            <span class="font-bold">Preview Mode</span>
        </div>
    @endif

    {{-- BLOG TITLE START --}}
    <div class="w-full flex items-center justify-center p-8 lg:p-10">
        <h1
            class="montserrat-bold text-3xl font-extrabold leading-none text-center md:text-4xl md:leading-tight lg:text-5xl lg:leading-none xl:text-6xl xl:leading-none text-[#25A8D6] my-12 xl:w-[70%]">
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
                        class="montserrat-bold text-base font-black leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9 text-white">
                        {{ $post->user->name }}
                    </span>

                </h3>

            </div>

            <div class="flex items-center justify-center gap-2">
                <p
                    class="montserrat-bold text-base font-normal leading-6 text-left md:text-lg md:leading-7 lg:text-xl lg:leading-8 xl:text-2xl xl:leading-9 text-white">
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
            class="montserrat-bold text-[48px] font-extrabold leading-none text-center md:leading-tight lg:leading-none xl:leading-none mb-8 lg:mb-12 text-[#26225F]">
            You may also like
        </h2>

        <div class="w-full flex flex-col lg:flex-row items-start justify-around gap-6 lg:gap-0">
            @foreach ($similar_posts as $similar_post)
                <div onclick="navigateTo('/blog/{{ $similar_post->slug }}')"
                    class="flex flex-col bg-[#26225F] w-[380px]">
                    <div>
                        <img class="w-[380px] cursor-pointer" src="{{ Storage::url($similar_post->featured_image) }}"
                            alt="{{ $similar_post->title }}" />
                    </div>
                    <div class="mx-12 pt-8 pb-5 text-white">
                        <h1 class="pb-4 leading-[20px] montserrat-semibold cursor-pointer">
                            {{ $similar_post->title }}
                        </h1>
                        <p class="montserrat-light text-xs pb-4">
                            {{ \Carbon\Carbon::parse($similar_post->published_at)->format('F d, Y') }}
                        </p>
                        <a class="text-[#25A8D6] text-[8px]" href="/blog/{{ $similar_post->id }}">READ MORE</a>
                    </div>
                </div>
            @endforeach
        </div>

        <script>
            function navigateTo(url) {
                window.location.href = url;
            }
        </script>
    </div>


</x-guest-layout>
