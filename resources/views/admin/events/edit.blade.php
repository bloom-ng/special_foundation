<x-admin-layout :page="'events'" :title="'Edit Event'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Edit Event</h1>
            <a href="{{ url('/admin/events') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Events
            </a>
        </div>

        <div class="w-full mt-6">
            <div class="bg-white p-8 rounded-md shadow-md">
                <form action="{{ url('/admin/events/'.$event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Event Name</label>
                        <input type="text" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $event->name) }}" 
                               required>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Event Image</label>
                        @if($event->image)
                            <div class="mb-4">
                                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->name }}" class="max-h-48 rounded-lg shadow-md">
                            </div>
                        @endif
                        <input type="file" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" 
                               id="image" 
                               name="image"
                               accept="image/jpeg,image/png,image/jpg">
                        <p class="text-gray-600 text-xs italic mt-1">Leave empty to keep the current image</p>
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Event Date</label>
                        <input type="datetime-local" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date') border-red-500 @enderror" 
                               id="date" 
                               name="date" 
                               value="{{ old('date', date('Y-m-d\TH:i', strtotime($event->date))) }}" 
                               required>
                        @error('date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Event Content</label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror" 
                                  id="content" 
                                  name="content" 
                                  rows="5" 
                                  required>{{ old('content', $event->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="inactive" {{ old('status', $event->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ old('status', $event->status) === 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Update Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-admin-layout>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush
