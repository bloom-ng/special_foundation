<x-admin-layout title="Admin | Add Downloads" page="downloads">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
            <div>
                <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                    New Document
                </p>
                <p
                    class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                    Upload a new document
                </p>
            </div>
            <div>
                <a type="button" href="/admin/downloads"
                    class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                    type="button" data-ripple-light="true">
                    Document List
                </a>
            </div>

        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                </p>
                <div class="leading-loose">
                    <form class="" method="POST" action="/admin/downloads" enctype="multipart/form-data">
                        @csrf
                        <div class="pb-2">
                            @error('name')
                            <div class="text-red-500">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <label class=" block  text-sm pb-1" for="name">Name</label>
                            <input class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 " 
                                    id="name" name="name" type="text" required placeholder="File Display Name" aria-label="Name">
                        </div>
                       

                        <div class="col-span-full mt-6">
                            <label for="document"
                                class="block text-sm font-medium leading-6 text-gray-900">Document
                                </label>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">

                                    <p id="file-added" class="text-sm leading-6 text-gray-600 "> </p>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600 flex-col">
                                        <label for="doc"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload File</span>
                                            <input class="sr-only " required accept=".pdf, .doc, .docx, .ppt, .pptx" id="doc" name="doc" type="file" >
                                        </label>
                                        <p class="text-xs leading-5 text-gray-600 ">PDF, DOC, DOCX, PPT, PPTX up to 20MB
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
              const docInput = document.getElementById('doc');
                const docNotification = document.getElementById('file-added');
        

                docInput.addEventListener('change', (e) => {
                    const file = docInput.files[0];
                    console.log('file :>> ', file);
                    const reader = new FileReader();

                    docNotification.innerHTML = file.name;
                    reader.onload = (event) => {
                    };

                    reader.readAsDataURL(file);
                });

        </script>
  
</x-admin-layout> 