<x-admin-layout :page="'awards'" :title="'Edit Award'">
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
            <h1 class="text-3xl text-black pb-6">Edit Award</h1>
            <a href="{{ route('admin.awards.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Awards
            </a>
        </div>

        <div class="w-full mt-6">
            <form method="POST" action="{{ route('admin.awards.update', $award) }}" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Award Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="name" type="text" name="name" value="{{ old('name', $award->name) }}" required>
                        <p class="text-sm text-gray-500 mt-1">For example: Anthem Awards, Gold</p>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="year">
                            Year
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('year') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="year" type="text" name="year" value="{{ old('year', $award->year) }}">
                        <p class="text-sm text-gray-500 mt-1">Leave blank for memberships with no year.</p>
                        @error('year')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                            Group
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('category') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                id="category" name="category" required>
                            @foreach (\App\Models\Award::getCategories() as $value => $label)
                                <option value="{{ $value }}" {{ old('category', $award->category) === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="recognition">
                            Status
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('recognition') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="recognition" type="text" name="recognition" value="{{ old('recognition', $award->recognition) }}">
                        <p class="text-sm text-gray-500 mt-1">For example: Winner, Finalist, Verified partner/member</p>
                        @error('recognition')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="sort_order">
                            Display Order
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('sort_order') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="sort_order" type="number" min="0" name="sort_order" value="{{ old('sort_order', $award->sort_order) }}">
                        <p class="text-sm text-gray-500 mt-1">Lower numbers appear first within the group.</p>
                        @error('sort_order')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="link">
                            Link
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('link') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="link" type="url" name="link" value="{{ old('link', $award->link) }}" placeholder="https://">
                        <p class="text-sm text-gray-500 mt-1">Optional. The blog post or awarding body page. Leave blank and the badge will not be clickable.</p>
                        @error('link')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                            Badge
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                               id="image" type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp">
                        <p class="text-sm text-gray-500 mt-1">Square PNG or WebP with a transparent background, recommended 240×240 px. Leave empty to keep the current badge.</p>
                        @if ($award->image)
                            <img class="h-16 w-16 mt-3 rounded object-contain border border-[#25A8D6] bg-white"
                                 src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->name }}">
                        @endif
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                            Visible on the website
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('status') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                                id="status" name="status" required>
                            <option value="active" {{ old('status', $award->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $award->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Award
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-admin-layout>
