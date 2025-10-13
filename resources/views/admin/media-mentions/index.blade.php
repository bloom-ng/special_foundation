<x-admin-layout title="Admin | Media Mentions" page="media-mentions">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Media Mentions</h1>
            <div class="flex space-x-4">
                <a href="/admin/media-mentions/create" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Create New Media Mention
                </a>
            </div>
        </div>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-white border-b">
                        <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Link</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($mentions as $mention)
                            <tr class="border-b">
                                <td class="text-left py-3 px-4">
                                    {{ $mention->title }}
                                </td>
                                <td class="text-left py-3 px-4">
                                    <a href="{{ $mention->url }}" target="_blank" class="text-blue-600 hover:underline">{{ $mention->url }}</a>
                                </td>
                                <td class="text-left py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                            href="/admin/media-mentions/{{ $mention->id }}/edit">
                                            Edit
                                        </a>
                                        <form id="media-mention-delete-{{ $mention->id }}"
                                            action="/admin/media-mentions/{{ $mention->id }}" method="POST"
                                            style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $mentions->links() }}
            </div>
        </div>
            
    </main>

    <script>
        @foreach ($mentions as $mention)
            const form{{ $mention->id }} = document.getElementById('media-mention-delete-{{ $mention->id }}');

            form{{ $mention->id }}.addEventListener('submit', (e) => {
                e.preventDefault();
                const confirmSubmit = confirm('Proceed to delete?');
                if (confirmSubmit) {
                    form{{ $mention->id }}.submit();
                }
            });
        @endforeach
    </script>

</x-admin-layout>
