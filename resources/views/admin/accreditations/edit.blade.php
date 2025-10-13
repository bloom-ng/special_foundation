<x-admin-layout :page="'accreditations'" :title="'Edit Accreditation'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Edit Accreditation</h1>
            <a href="{{ route('admin.accreditations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Accreditations
            </a>
        </div>

        <div class="w-full mt-6">
            <form method="POST" action="{{ route('admin.accreditations.update', $accreditation) }}" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                               id="name" 
                               type="text" 
                               name="name"
                               value="{{ old('name', $accreditation->name) }}"
                               required>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                            Logo
                        </label>
                        @if($accreditation->image)
                            <div class="mt-2 mb-2">
                                <img src="{{ asset('storage/' . $accreditation->image) }}" alt="{{ $accreditation->name }}" class="w-16 h-16 rounded object-cover border border-[#25A8D6]">
                            </div>
                        @endif
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                               id="image" 
                               type="file" 
                               name="image"
                               accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Upload a square SVG or PNG (transparent), recommended 80×80–120×120 px.</p>
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                            Status
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('status') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="inactive" {{ old('status', $accreditation->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ old('status', $accreditation->status) == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.accreditations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 mr-2">Cancel</a>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Update Accreditation
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-admin-layout>
