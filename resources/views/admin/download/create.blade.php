<x-admin-layout title="Admin | Add Downloads" page="downloads">

    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Create Download</h1>

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
                            <label class=" block text-sm pb-1" for="name">Name</label>
                            <input class="w-full px-5 py-1 text-black bg-white " id="name" name="name" type="text" required placeholder="File Display Name" aria-label="Name">
                        </div>
                        <div class="mt-2">
                            @error('doc')
                                <div class="text-red-500">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <label class="block text-sm  pb-1" for="file">File</label>
                            <input class="w-full px-5  py-4 text-black bg-white " id="doc" name="doc" type="file" >
                        </div>

                        <div class="mt-6">
                            <button class="px-6 py-1 text-white font-light tracking-wider bg-[#26225F] " type="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>
  
</x-admin-layout> 