<x-admin-layout title="Admin | Blog List" page="blogs">
 
    <main class="w-full flex-grow p-6">
        <h1 class="text-xl text-black pb-6">Blog Management</h1>

        <div class="w-full mt-12">
            <p class="text-lg pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Posts
            </p>
            @foreach ($posts as $post )

            <ul role="list" class="divide-y divide-gray-100">
                <a href="/admin/blogs/{{$post->id}}" class="text-decoration-none">
                <li class="flex justify-between gap-x-6 py-5">
                  <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{$post->featured_image}}" alt="">
                    <div class="min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900">{{$post->title}}</p>
                      <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$post->summary}}</p>
                    </div>
                  </div>
                  <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">{{$post->user->name}}</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500"> {{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }} <time datetime="$post->published_at">  {{ $post->read_time }}</time></p>
                  </div>
                </li>
                </a>
            </ul>
            @endforeach
                


            {{-- Hidden --}}
           
        </div>

        {{$posts->links()}}
    </main>

    <script>
        const form = document.getElementById('beneficiary-delete');
      
        form.addEventListener('submit', (e) => {
          e.preventDefault(); // Prevent the form from submitting normally
          const confirmSubmit = confirm('Proceed to delete?');
          if (confirmSubmit) {
            form.submit(); // Submit the form if the user confirms
          }
        });
      </script>

</x-admin-layout>
