<x-admin-layout :page="'events'" :title="'Edit Event'">
    <script type="text/javascript" src='/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#content',
            height: 500,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_css: 'tinymce-5',
            images_upload_url: '{{ route("upload-img") }}',
            promotion: false
        });
    </script>

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Edit Event</h1>
            <a href="{{ url('/admin/events') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Events
            </a>
        </div>

        <div class="w-full mt-6">
            <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('PUT')
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Event Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('name') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                               id="name" 
                               type="text" 
                               name="name"
                               value="{{ old('name', $event->name) }}"
                               required>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="date">
                            Event Date
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('date') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                               id="date" 
                               type="datetime-local" 
                               name="date"
                               value="{{ old('date', \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i')) }}"
                               required>
                        @error('date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                            Event Image
                        </label>
                        @if($event->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}" class="max-w-xs">
                            </div>
                        @endif
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                               id="image" 
                               type="file" 
                               name="image"
                               accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Recommended dimensions: 1200x630 pixels (16:9 ratio) for optimal display</p>
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- <div class="w-full px-3 mb-6 flex space-x-4">
                        <div class="flex-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_width">
                                Image Width (px) (Optional)
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image_width') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                                   id="image_width" 
                                   type="number" 
                                   name="image_width"
                                   value="{{ old('image_width', $event->image_width) }}"
                                   min="1" max="2000" placeholder="e.g., 1200">
                            @error('image_width')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_height">
                                Image Height (px) (Optional)
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('image_height') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                                   id="image_height" 
                                   type="number" 
                                   name="image_height"
                                   value="{{ old('image_height', $event->image_height) }}"
                                   min="1" max="2000" placeholder="e.g., 630">
                            @error('image_height')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> -->

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">
                            Event Content
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror tinymce" 
                                  id="content" 
                                  name="content" 
                                  rows="5" 
                                  required>{{ old('content', $event->content) }}</textarea>
                        @error('content')
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
                            <option value="inactive" {{ old('status', $event->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.events.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 mr-2">Cancel</a>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Update Event
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-admin-layout>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.tinymce',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
            alignleft aligncenter alignright alignjustify | \
            bullist numlist outdent indent | removeformat | help'
    });
</script>
@endpush
