<x-admin-layout title="Admin | Dashboard" page="dashboard">

    <main class="w-full flex-grow p-6">
        <section class="container mx-auto py-8 px-8">
            <div class="flex justify-between md:items-center">
                <div>
                    <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                        Overall Stats
                    </p>
                    <p
                        class="block antialiased font-sans text-sm font-light leading-normal text-inherit font-normal text-gray-600 md:w-full w-4/5">
                        Upward arrow indicating an increase compared to the previous
                        month.
                    </p>
                </div>

            </div>
            <div class="mt-6 grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 items-center md:gap-2.5 gap-4">
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md shadow-sm border border-gray-200 !rounded-lg">
                    <div class="p-6 p-4">
                        <div class="flex justify-between items-center">
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit !font-medium !text-xs text-gray-600">
                                Newsletter Subscribers
                            </p>
                            <div class="flex items-center gap-1">
                                <p
                                    class="block italic antialiased {{$subStats['is_up'] ? 'text-green-400' : 'text-red-400'}} font-sans text-base font-light leading-relaxed text-inherit !font-medium !text-xs ">
                                    @if ($subStats['is_up'])
                                    <i class="fa fa-chevron-up"></i>
                                    @else
                                    <i class="fa fa-chevron-down"></i>
                                    @endif
                                    {{$subStats["up_by"]}}%
                                </p>
                            </div>
                        </div>
                        <p
                            class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 font-bold text-2xl">
                            {{ $subscribers }}
                        </p>
                    </div>
                </div>
                <div
                class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md shadow-sm border border-gray-200 !rounded-lg">
                <div class="p-6 p-4">
                    <div class="flex justify-between items-center">
                        <p
                            class="block antialiased font-sans text-base font-light leading-relaxed text-inherit !font-medium !text-xs text-gray-600">
                            Beneficiary Applications
                        </p>
                        <div class="flex items-center gap-1">
                           
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed {{$beneficiaryStats['is_up'] ? 'text-green-400' : 'text-red-400'}} !text-xs">
                                @if ($beneficiaryStats['is_up'])
                                <i class="fa fa-chevron-up"></i>
                                @else
                                <i class="fa fa-chevron-down"></i>
                                @endif
                                {{$beneficiaryStats["up_by"]}}%
                            </p>
                        </div>
                    </div>
                    <p
                        class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 font-bold text-2xl">
                        {{ $beneficiaries }}
                    </p>
                </div>
            </div>
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md shadow-sm border border-gray-200 !rounded-lg">
                    <div class="p-6 p-4">
                        <div class="flex justify-between items-center">
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit !font-medium !text-xs text-gray-600">
                                Published Posts
                            </p>
                           
                        </div>
                        <p
                            class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 font-bold text-2xl">
                            {{ $posts }}
                        </p>
                    </div>
                </div>
                <div
                    class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md shadow-sm border border-gray-200 !rounded-lg">
                    <div class="p-6 p-4">
                        <div class="flex justify-between items-center">
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit !font-medium !text-xs text-gray-600">
                                Uploaded Documents
                            </p>
                            
                        </div>
                        <p
                            class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 font-bold text-2xl">
                            {{ $documents }}
                        </p>
                    </div>
                </div>
              
            </div>


            <div class="flex justify-between md:items-center mb-4 mt-12">
                <div>
                    <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                        Recent Posts
                    </p>
                   
                </div>

            </div>


            @foreach ($latest_posts as $post)
                <ul role="list" class="divide-y divide-gray-100">

                    <li class="flex justify-between gap-x-8 py-5 mt-6 hover:bg-white  shadow-md px-2">

                        <div class="flex min-w-0 gap-x-4">
                            <p
                                class=" text-xl font-bold {{ $post->is_featured ? 'text-yellow-600' : 'text-gray-400' }} ">
                                &#x2665;</p>
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                src="{{ Storage::url($post->featured_image) }}" alt="">
                            <div class="min-w-0 flex-auto">
                                <a href="/admin/blogs/{{ $post->id }}" class="text-decoration-none">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $post->title }}
                                        {{ $post->getPublishedAttribute() ? '' : '[Draft]' }} </p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $post->summary }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $post->user->name }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                {{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }} - <time
                                    datetime="$post->published_at"> {{ $post->read_time }}</time></p>

                        </div>
                    </li>
                </ul>
            @endforeach

        </section>




    </main>

</x-admin-layout>
