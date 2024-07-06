<x-admin-layout title="Admin | Blog View" page="blogs">

<!-- Add the theme's stylesheet -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">

 
    <main class="w-full flex-grow p-6">
        <h1 class="text-xl text-black pb-6">Blog Management</h1>

        <div class="w-full mt-12">
            <p class="text-lg pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>Manage Posts
            </p>


                <!-- Post Form Section -->
                <div class=" mx-auto mt-8">
                    <div class="bg-white shadow-sm rounded px-4 ">
                
                       
                        <form method="POST" action="/admin/blogs/{{ $post->id }}" enctype="multipart/form-data">
                            @csrf
                
                            <div class="">
                                <!-- Profile Section -->
                                <div class="border-b border-gray-900/10 pb-8">
                                    
                                    <div class="mt-6 pt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="title" class="block text-sm font-semibold leading-6 text-gray-900">Title</label>
                                            <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" class="px-2 block shadow-md w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                        </div>
                
                
                                        <div class="col-span-full mt-8">
                                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900"></label>
                                            <div id="editor-container" class="block w-full border-0 bg-transparent py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{!! old('body', $post->body ?? '') !!}</div>
                                            <input type="hidden" id="body" name="body">
                                        </div>

                                        
                                        <div class="col-span-full mt-8">
                                            <label for="summary" class="block text-sm font-medium leading-6 text-gray-900">Summary</label>
                                            <textarea id="summary" name="summary" rows="3" class="block w-full border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('summary', $post->summary ?? '') }}</textarea>
                                        </div>
                
                                        <div class="col-span-full mt-6">
                                            <label for="published_at" class="block text-sm font-medium leading-6 text-gray-900 px-2">Publish Date</label>
                                            <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', isset($post) ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}" class="block w-full border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                
                                        <div class="col-span-full mt-6">
                                            <label for="featured_image" class="block text-sm font-medium leading-6 text-gray-900 px-2">Featured Image</label>
                                            <input type="file" id="featured_image" name="featured_image" class="block px-2 w-full border-0 bg-transparent py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <img id="image-preview" src="{{ Storage::url($post->featured_image) }}" class="w-24 h-auto">
                                        </div>
                
                                        <div class="col-span-full mt-6">
                                            <label for="featured_image_caption" class="block text-sm font-medium leading-6 text-gray-900">Image Caption</label>
                                            <input type="text" id="featured_image_caption" name="featured_image_caption" value="{{ old('featured_image_caption', $post->featured_image_caption ?? '') }}" class="block w-full border-0 bg-transparent px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            
                                        </div>
                
                                        <div class="col-span-full mt-6">
                                            <label for="is_featured" class="flex items-center">
                                                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', isset($post) && $post->is_featured ? 'checked' : '') }} class="form-checkbox accent-indigo-500">
                                                <span class="ml-2 text-gray-900">Featured Post</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Personal Information Section (Optional) -->
                                <!-- Notification Section (Optional) -->
                
                            </div>
                
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
  
  <!-- Quill JS Initialization -->
  <!-- Include the Quill library -->
  <script>
    const quill = new Quill('#editor-container', {
      theme: 'snow',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          ['link', '', ''],
          ['code-block', 'blockquote'],
          ['list-ol', 'list-ul'],
          ['align-left', 'align-center', 'align-right']
        ]
      }
    });
    quill.on('text-change', () => {
      document.getElementById('body').value = quill.root.innerHTML;
    });


    // Image

    const imageInput = document.getElementById('featured_image');
const imagePreview = document.getElementById('image-preview');

imageInput.addEventListener('change', (e) => {
  const file = imageInput.files[0];
  const reader = new FileReader();

  reader.onload = (event) => {
    imagePreview.src = event.target.result;
  };

  reader.readAsDataURL(file);
});
  </script>


           
        </div>

    
    </main>

   

</x-admin-layout>
