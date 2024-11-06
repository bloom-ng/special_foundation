<x-admin-layout title="Admin | Edit Ai Knowledge" page="cms-ai">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
            <div>
                <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                    Update Knowledge Base
                </p>
                <p
                    class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                    Provide additionl knowledge base for the Chatbot
                </p>
            </div>
            

        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                </p>
                <div class="leading-loose">
                    <form class="" method="POST" action="/admin/cms-data/ai/{{ $cms->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-span-full mt-8">
                            <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Additional Knowledge base</label>
                            <textarea id="content" name="content" rows="6"
                                class="block w-full font-mono border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $cms->value }}</textarea>
                        </div>
                     

                        <div class="mt-6">
                            <button class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

       
  
</x-admin-layout>
