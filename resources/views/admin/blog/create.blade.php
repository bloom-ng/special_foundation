<x-admin-layout title="Admin | Blog View" page="blogs">

    <!-- Add the theme's stylesheet -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">


    <main class="w-full flex-grow p-6">

        <div class="w-full my-4">

            <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
                <div>
                    <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                        {{ isset($post->title) ? 'Edit Post' : 'New Post' }}
                    </p>
                    <p
                        class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                        {{ isset($post->title) ? 'Update data for this post' : 'Create a new post' }}
                    </p>
                </div>
                <div>
                    <a type="button" href="/admin/blogs"
                        class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                        type="button" data-ripple-light="true">
                        Post List
                    </a>
                </div>

            </div>




            <!-- Post Form Section -->
            <div class=" mx-auto mt-8">
                <div class="bg-white shadow-sm rounded px-4 ">


                    <form method="POST" action="/admin/blogs/{{ $post->id }}" enctype="multipart/form-data">
                        @csrf

                        <div class="">
                            <div class="border-b border-gray-900/10 pb-8">

                                <div class="mt-6 pt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="title"
                                            class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
                                        <input type="text" id="title" name="title"
                                            value="{{ old('title', $post->title ?? '') }}"
                                            class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            required>
                                    </div>

                                    <div class="col-span-full mt-6">
                                        <label for="cover-photo"
                                            class="block text-sm font-medium leading-6 text-gray-900">Featured
                                            Image</label>
                                        <div
                                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                            <div class="text-center">

                                                <img alt="" id="image-preview"
                                                    src="{{ Storage::url($post->featured_image) }}"
                                                    class=" mx-auto w-60 h-auto">
                                                <div class="mt-4 flex text-sm leading-6 text-gray-600 flex-col">
                                                    <label for="featured_image"
                                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                        <span>Upload an Image</span>
                                                        <input type="file" accept="image/*" id="featured_image"
                                                            name="featured_image" class="sr-only">
                                                    </label>
                                                    <p class="text-xs leading-5 text-gray-600 ">PNG, JPG, GIF up to 5MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-span-full mt-6">
                                        <label for="featured_image_caption"
                                            class="block text-sm font-medium leading-6 text-gray-900">Image
                                            Caption</label>
                                        <input type="text" id="featured_image_caption" name="featured_image_caption"
                                            value="{{ old('featured_image_caption', $post->featured_image_caption ?? '') }}"
                                            class="block w-full border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                    </div>


                                    <div class="col-span-full mt-8 mb-4">
                                        <label for="body"
                                            class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                                        <div id="editor-container"
                                            class="block w-full border-0 bg-transparent py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            {!! old('body', $post->body ?? '') !!}</div>
                                        <input type="hidden" id="body" name="body">
                                    </div>


                                    <div class="col-span-full mt-8">
                                        <label for="summary"
                                            class="block text-sm font-medium leading-6 text-gray-900">Summary (required
                                            for SEO meta description)</label> 
                                            <button id="ask-ai" type="button" class="text-indigo-500"> Ask Ai <i class="fas fa-robot"></i> 
                                                <span id="ai-loader" class="hidden pl-2">  
                                                    <i class="fas fa-spinner fa-spin"></i>
                                                </span>
                                            </button> 
                                        <textarea id="summary" name="summary" rows="3"
                                            class="block w-full border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('summary', $post->summary ?? '') }}</textarea>
                                    </div>

                                    <div class="col-span-full mt-6">
                                        <label for="published_at"
                                            class="block text-sm font-medium leading-6 text-gray-900 px-2">Publish
                                            Date</label>
                                        <input type="datetime-local" id="published_at" name="published_at"
                                            value="{{ old('published_at', isset($post) ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}"
                                            class="block w-full border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>



                                    <div class="col-span-full mt-6">
                                        <label for="is_featured" class="flex items-center">
                                            <input type="checkbox" id="is_featured" name="is_featured"
                                                value="{{ old('is_featured', isset($post) && $post->is_featured ? $post->is_featured : '0') }}"
                                                {{ old('is_featured', isset($post) && $post->is_featured ? 'checked' : '') }}
                                                class="form-checkbox accent-indigo-500">
                                            <span class="ml-2 text-gray-900">Featured Post</span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="/admin/blogs" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quill JS Initialization -->
            <!-- Include the Quill library -->
            <script>
                const quill = new Quill('#editor-container', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'],
                            ['link', '', ''],
                            ['code-block', 'blockquote'],
                            ['list-ol', 'list-ul'],
                            ['align-left', 'align-center', 'align-right']
                        ]
                    }
                });
                quill.on('text-change', () => {
                    document.getElementById('body').value = quill.root.innerHTML;
                });

                // Set Data
                document.getElementById('body').value = quill.root.innerHTML



                // Image

                const imageInput = document.getElementById('featured_image');
                const imagePreview = document.getElementById('image-preview');
        

                imageInput.addEventListener('change', (e) => {
                    const file = imageInput.files[0];
                    const reader = new FileReader();

                    reader.onload = (event) => {
                        imagePreview.src = event.target.result;
                    };

                    reader.readAsDataURL(file);
                });

                const aiBtn = document.getElementById('ask-ai');
                aiBtn.addEventListener('click', async (e) => {
                    e.preventDefault();
                    document.getElementById('ai-loader').classList.remove('hidden');
                    const body =  document.getElementById('body').value;
                    const title =  document.getElementById('title').value;
                    const messages = [
                        {
                            role: 'system',
                            content: `You are a copywriter.
                            Create a summary of the following text.
                            this summary would be used as a meta description for the blog post. 
                            The summary should be around 160 characters.
                            Your response should be without any kind of formating, just a plain text that can be added to a meta description tag.
                            `
                        },
                        {
                            role: 'user',
                            content: ` Title: ${title} \n\nBody: ${body}`
                        }
                    ];
                    const response = await callChatAPI(messages);
                    console.log(response.choices[0].message.content);
                    document.getElementById('ai-loader').classList.add('hidden');
                    document.getElementById('summary').value = response.choices[0].message.content;
                });

                async function callChatAPI(messages, model, temperature) {
                    const url = '/api/chat'; // assume the API route is on the same origin
                    const headers = {
                        'Content-Type': 'application/json'
                    };
                    const data = {
                        model: model || 'gpt-3.5-turbo', // gpt-4o-mini
                        temperature: temperature || 0.4,
                        messages: messages || []
                    };

                    const response = await fetch(url, {
                        method: 'POST',
                        headers,
                        body: JSON.stringify(data)
                    });

                    const responseBody = await response.json();
                    return responseBody;
                }
            </script>



        </div>


    </main>



</x-admin-layout>
