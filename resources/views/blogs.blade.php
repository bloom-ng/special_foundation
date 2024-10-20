<x-guest-layout title="Blogs | Special Foundation" page="blog">

    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Blog Posts
            </div>
        </div>
    </div>

    <div class="p-8 lg:p-20">
        {{-- FEATURED BLOG START --}}
        <div class="w-full flex flex-col">
            @if (count($featured_posts) >= 1)
                <h2
                    class="font-montserrat text-4xl font-extrabold leading-none text-left md:leading-tight lg:leading-none xl:leading-none text-[#26225F] mb-12">
                    Featured Blog Posts
                </h2>

                <div class="flex flex-col lg:flex-row items-center lg:items-start justify-center gap-12">
                    @foreach ($featured_posts as $post)
                        @if ($loop->iteration == 1)
                            <div onclick="navigateTo('/blog/{{ $post->slug }}')"  class="cursor-pointer w-full lg:w-[60%]">
                                <img src="{{ Storage::url($post->featured_image) }}" class="w-full max-h-[467px]"
                                    alt="{{ $post->title }}">
                                <div class="w-full px-12 pt-8 pb-5 text-white bg-[#26225F]">
                                    <h1 class="pb-4 leading-[20px] montserrat-semibold">
                                        {{ $post->title }}
                                    </h1>
                                    <p class="montserrat-light text-xs pb-4">
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('F d, Y') }}
                                    </p>
                                    <a class="text-[#25A8D6] text-[8px]" href="/blog/{{ $post->slig }}">READ MORE</a>
                                </div>
                            </div>
                        @elseif ($loop->iteration == 2)
                            <div onclick="navigateTo('/blog/{{ $post->slug }}')"  class=" cursor-pointer w-full lg:w-[40%]">
                                <img src="{{ Storage::url($post->featured_image) }}" class="w-full h-full max-h-[467px]"
                                    alt="{{ $post->title }}">
                                <div class="w-full px-12 pt-8 pb-5 text-white bg-[#26225F]">
                                    <h1 class="pb-4 leading-[20px] montserrat-semibold">
                                        {{ $post->title }}
                                    </h1>
                                    <p class="montserrat-light text-xs pb-4">
                                        {{ \Carbon\Carbon::parse($post->published_at)->format('F d, Y') }}
                                    </p>
                                    <a class="text-[#25A8D6] text-[8px]" href="/blog/{{ $post->slug }}">READ MORE</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="flex flex-col lg:flex-row items-center lg:items-start justify-center gap-12 my-12">
                    @foreach ($featured_posts as $post)
                        @if ($loop->iteration > 2 && $loop->iteration <= 4)
                            <div onclick="navigateTo('/blog/{{ $post->slug }}')"  class="cursor-pointer w-full lg:w-[50%]">
                                    <img src="{{ Storage::url($post->featured_image) }}"
                                        class="w-full h-full max-h-[467px]" alt="{{ $post->title }}">
                                    <div class="w-full px-12 pt-8 pb-5 text-white bg-[#26225F]">
                                        <h1 class="pb-4 leading-[20px] montserrat-semibold">
                                            {{ $post->title }}
                                        </h1>
                                        <p class="montserrat-light text-xs pb-4">
                                            {{ \Carbon\Carbon::parse($post->published_at)->format('F d, Y') }}
                                        </p>
                                        <a class="text-[#25A8D6] text-[8px]" href="/blog/{{ $post->slug }}">READ MORE</a>
                                    </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p class="text-center text-[#26225F]">No featured blogs available.</p>
            @endif
        </div>
        {{-- FEATURED BLOG END --}}



        {{-- BLOGS START --}}
        <div class="w-full flex flex-col my-12">
            <h2
                class="font-montserrat text-4xl font-extrabold leading-none text-left md:leading-tight lg:leading-none xl:leading-none text-[#26225F] mb-12">
                Blog Posts
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                @forelse ($posts as $post)
                    <div onclick="navigateTo('/blog/{{ $post->slug }}')"   class="w-full flex flex-col lg:flex-row items-center justify-center cursor-pointer">
                        <img src="{{ Storage::url($post->featured_image) }}"
                            class="w-full lg:w-[50%] max-h-[370px] rounded-3xl" alt="">
                        <div class="w-full lg:w-[50%] px-12 pt-8 pb-5 text-[#26225F]">
                            <h1 class="pb-5 leading-[22px] montserrat-bold text-[12px] xl:text-[14px] 2xl:text-[18px]">
                                {{ $post->title }}
                            </h1>
                            <p class="montserrat-light text-xs pb-5">
                                {{ \Carbon\Carbon::parse($post->published_at)->format('F d, Y') }}
                            </p>
                            <a class="text-[8px]" href="/blog/{{ $post->slug }}">READ MORE</a>
                        </div>
                        
                    </div>
                @empty
                    <div class="w-full text-[#26225F]">
                        <p class="montserrat-bold text-[18px] md:text-[20px] xl:text-[24px] text-center">
                            No blogs available.
                        </p>
                    </div>
                @endforelse

            </div>

            {{ $posts->links() }}
        </div>
        {{-- BLOGS END --}}

        <script>
            function navigateTo(url) {
                window.location.href = url;
            }
        </script>
    </div>

</x-guest-layout>
