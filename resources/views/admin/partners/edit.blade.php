<x-admin-layout title="Admin | Edit Partner Logo" page="cms-partners">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
            <div>
                <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                    Update Partner Logo
                </p>
                <p
                    class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                    Update a partner logo
                </p>
            </div>
            <div>
                <a type="button" href="/admin/cms-data/partners"
                    class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                    type="button" data-ripple-light="true">
                    Partner Logos
                </a>
            </div>

        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                </p>
                <div class="leading-loose">
                    <form class="" method="POST" action="/admin/cms-data/partners/{{ $cms->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="col-span-full mt-6" id="media-container">
                            <label for="partner"
                                class="block text-sm font-medium leading-6 text-gray-900">Partner Logo
                            </label>

                            <!-- Show current logo -->
                            <div class="mt-2">
                                <img src="{{ Storage::url($cms->value) }}" class="w-72 h-48 rounded-md mb-4">
                            </div>

                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <p id="file-added" class="text-sm leading-6 text-gray-600 "> </p>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600 flex-col">
                                        <label for="partner"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload New Logo</span>
                                            <input class="sr-only" accept="image/*" id="partner" name="partner" type="file">
                                        </label>
                                        <p class="text-xs leading-5 text-red-600">Media up to 2MB 
                                            
                                            (Maximum height - {{$cms->type == \App\Models\CMS::TYPE_PARTNERS_CLOUD ? "300px" : "90px"}} )
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const docInput = document.getElementById('partner');
            const docNotification = document.getElementById('file-added');
           
            docInput.addEventListener('change', (e) => {
                const file = docInput.files[0];
                const reader = new FileReader();

                docNotification.innerHTML = file.name;
                reader.onload = (event) => {};

                reader.readAsDataURL(file);
            });
        </script>
  
</x-admin-layout>
