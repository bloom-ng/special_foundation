<x-admin-layout title="Admin | Downloads" page="downloads">
 
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Downloads</h1>

        <div class="w-full mt-12">
            <div class="text-xl pb-3 flex justify-between items-center">
                <div class="mr-3 ">
                    <i class="fas fa-list mr-3"></i>
                    Downloads
                </div>
                <a type="button" href="/admin/downloads/create" class=" text-xs bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                   <i class="fas fa-plus"></i> New
                </a>
            </div>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-indigo-900 text-white">
                        <tr>
                            <th
                                class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                ID
                            </th>
                            <th
                                class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                Name
                            </th>
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                URL
                            </th>
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-xs">
                        @foreach ($downloads as $download)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $download->id }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $download->name }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                <a href="{{ Storage::url($download->url) }}" target="_blank" >Link</a>
                            </td>
                           
                            <td class="w-1/3 text-left py-3 px-4">
                                <form
                                    id="download-delete"
                                    action="/admin/downloads/{{$download->id}}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        const form = document.getElementById('download-delete');
      
        form.addEventListener('submit', (e) => {
          e.preventDefault(); // Prevent the form from submitting normally
          const confirmSubmit = confirm('Proceed to delete?');
          if (confirmSubmit) {
            form.submit(); // Submit the form if the user confirms
          }
        });
      </script>

</x-admin-layout>
