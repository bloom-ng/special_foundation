<x-admin-layout title="Admin | Blog List" page="blogs">

    <main class="w-full flex-grow p-6">

        <div class="w-full my-4 ">

            <section class="container mx-auto py-8">
                <div class="flex gap-y-4 flex-col ">
                    <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
                        <div>
                            <p
                                class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                                Posts
                            </p>
                            <p
                                class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                                See information about all posts
                            </p>
                        </div>
                        <div>
                            <a type="button" href="/admin/blogs/create"
                                class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                                type="button" data-ripple-light="true">
                                + add post
                            </a>
                        </div>

                    </div>
                    <div class="flex justify-start md:justify-end gap-2">
                        <form method="GET">
                            <div class="lg:w-96">
                                <div class="relative w-full min-w-[200px] h-10">

                                    <div
                                        class="grid place-items-center absolute text-blue-gray-500 top-2/4 right-3 -translate-y-2/4 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="h-5 w-5">
                                            <path fill-rule="evenodd"
                                                d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input
                                        class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent placeholder:opacity-0 focus:placeholder:opacity-100 text-sm px-3 py-2.5 rounded-[7px] !pr-9 border-blue-gray-200 focus:border-gray-900"
                                        placeholder=" " name="search" /><label
                                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">Search<!-- -->
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            @foreach ($posts as $post)
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
                                <a target="_blank"  href="/blog/{{ $post->id }}?preview=true" class="text-blue-500 text-xs">
                                    Preview
                                </a>
                                <form
                                    id="post-delete-{{ $post->id }}"
                                    action="/admin/blogs/{{$post->id}}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 text-xs">
                                        Delete
                                    </button>
                                </form>
                        </div>
                    </li>
                </ul>
               
            @endforeach



            {{-- Hidden --}}

        </div>

        {{ $posts->links() }}
    </main>

    <script>
       @foreach ($posts as  $post)
       
                  const form{{ str_replace('-', '', $post->id) }} = document.getElementById('post-delete-{{ $post->id }}');
                
                  form{{str_replace('-', '', $post->id)}}.addEventListener('submit', (e) => {
                    e.preventDefault(); // Prevent the form from submitting normally
                    const confirmSubmit = confirm('Proceed to delete?');
                    if (confirmSubmit) {
                      form{{ str_replace('-', '', $post->id) }}.submit(); // Submit the form if the user confirms
                    }
                  });
                
         
       @endforeach
    </script>

</x-admin-layout>
