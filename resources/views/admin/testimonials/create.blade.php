<x-admin-layout :page="'testimonials'" :title="'Create Testimonial'">
    <main class="w-full flex-grow p-6">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Please fix the following errors:</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Create Testimonial</h1>
            <a href="{{ route('admin.testimonials.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Testimonials
            </a>
        </div>

        <div class="w-full mt-6">
            <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('POST')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="role">
                            Role (optional)
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('role') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="role"
                               type="text"
                               name="role"
                               value="{{ old('role') }}">
                        @error('role')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                            Photo
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="image"
                               type="file"
                               name="image"
                               accept="image/jpeg,image/png,image/jpg"
                               required>
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="quote">
                            Quote
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('quote') border-red-500 @enderror"
                                  id="quote"
                                  name="quote"
                                  rows="4"
                                  required>{{ old('quote') }}</textarea>
                        @error('quote')
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
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Testimonial
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-admin-layout>
