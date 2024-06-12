<x-admin-layout title="Admin | Newsletter" page="newsletter">
 
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Newsletters</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Newsletters
                </p>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-indigo-900 text-white">
                            <tr>
                                <th
                                    class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm"
                                >
                                    ID
                                </th>
                                <th
                                    class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm"
                                >
                                    Name
                                </th>
                                <th
                                    class="text-left py-3 px-4 uppercase font-semibold text-sm"
                                >
                                    Email
                                </th>
                                <th
                                    class="text-left py-3 px-4 uppercase font-semibold text-sm"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($newsletters as $newsletter)
                            <tr>
                                <td class="w-1/3 text-left py-3 px-4">
                                    {{ $newsletter->id }}
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">
                                    {{ $newsletter->name }}
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">
                                    {{ $newsletter->email }}
                                </td>
                               
                                <td class="w-1/3 text-left py-3 px-4">
                                    <form
                                        id="newsletter-delete"
                                        action="/admin/newsletters/{{$newsletter->id}}"
                                        method="POST"
                                        style="display: inline"
                                    >
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $newsletters->links() }}
                </div>
            </div>
        </main>

        <script>
            const form = document.getElementById('newsletter-delete');
          
            form.addEventListener('submit', (e) => {
              e.preventDefault(); // Prevent the form from submitting normally
              const confirmSubmit = confirm('Proceed to delete?');
              if (confirmSubmit) {
                form.submit(); // Submit the form if the user confirms
              }
            });
          </script>

</x-admin-layout>
