<x-admin-layout title="Admin | Edit Team Member" page="cms-teams">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
            <div>
                <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                    Update Team Member
                </p>
                <p
                    class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                    Update team member details
                </p>
            </div>
            <div>
                <a type="button" href="/admin/cms-data/teams"
                    class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                    type="button" data-ripple-light="true">
                    Team Members
                </a>
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                </p>
                <div class="leading-loose">
                    <form class="" method="POST" action="/admin/cms-data/teams/{{ $cms->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="pb-2">
                            <label class="block text-sm pb-1" for="name">Name</label>
                            <input class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                   id="name" name="name" type="text" required placeholder="Name" value="{{ $cms->name }}">
                        </div>

                        <div class="pb-2">
                            <label class="block text-sm pb-1" for="linkedInUrl">LinkedIn URL</label>
                            <input class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                   id="linkedInUrl" name="linkedInUrl" type="text" required placeholder="LinkedIn URL" value="{{ $cms->page }}">
                        </div>

                        <div class="pb-2">
                            <label class="block text-sm pb-1" for="position">Position (leave blank for Board Member)</label>
                            <input class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                   id="position" name="position" type="text" placeholder="Position" value="{{ $cms->slug }}">
                        </div>

                        <div class="pb-2">
                            <label class="block text-sm pb-1" for="type">Team Type</label>
                            <select class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" 
                                    id="type" name="type" required>
                                @foreach (\App\Models\CMS::getTeamTypeMapping() as $key => $value)
                                    <option value="{{$key}}" {{ $cms->type == $key ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-full mt-6" id="media-container">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            
                            <!-- Show current image -->
                            <div class="mt-2">
                                @php
                                    $value = json_decode($cms->value, true);
                                @endphp
                                <img src="{{ Storage::url($value['image']) }}" class="w-60 h-auto rounded-md mb-4" id="image-preview">
                            </div>

                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <p id="file-added" class="text-sm leading-6 text-gray-600"></p>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600 flex-col">
                                        <label for="image"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload New Image</span>
                                            <input class="sr-only" accept="image/*" id="image" name="image" type="file">
                                        </label>
                                        <p class="text-xs leading-5 text-red-600">Media up to 2MB (Dimensions - 192px x 198px)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full mt-8">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Profile</label>
                            <textarea id="description" name="description" rows="6"
                                class="block w-full font-mono border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $value['content'] }}</textarea>
                        </div>

                        <div class="mt-6">
                            <button class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            const docInput = document.getElementById('image');
            const docNotification = document.getElementById('file-added');
            const imagePreview = document.getElementById('image-preview');
            
            docInput.addEventListener('change', (e) => {
                const file = docInput.files[0];
                const reader = new FileReader();

                docNotification.innerHTML = file.name;
                reader.onload = (event) => {
                    imagePreview.src = event.target.result;
                };

                reader.readAsDataURL(file);
            });
        </script>
    </main>
</x-admin-layout>
