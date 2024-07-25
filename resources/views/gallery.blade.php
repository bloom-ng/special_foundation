<x-guest-layout title="Special Foundation - Gallery" page="blog">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Gallery
            </div>
        </div>
    </div>

    <div class="w-full py-20 px-8 lg:px-20 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-16">
        @foreach ($galleries as $gallery)
            @if ($gallery->type == 1)
                <img src="{{ Storage::url($gallery->url) }}" alt="{{ $gallery->title }}" class="h-[351px] w-full">
            @elseif ($gallery->type == 2)
                <div class="w-full h-[351px]">
                    <iframe class="w-full h-full" src="{{ $gallery->value }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            @elseif ($gallery->type == 3)
                <video src="{{ Storage::url($gallery->url) }}" controls class="h-[351px] w-full">
                    Your browser does not support the video tag.
                </video>
            @endif
        @endforeach
        {{ $posts->links() }}
    </div>
</x-guest-layout>
