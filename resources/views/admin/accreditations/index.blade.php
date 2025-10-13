<x-admin-layout :page="'accreditations'" :title="'Accreditations'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Accreditations</h1>
            <div class="flex space-x-4">
                <a href="{{ route('admin.accreditations.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Create New Accreditation
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">Only the latest 4 active accreditations appear in the footer. Use the Active status to control visibility and create/update to reorder which 4 appear.</span>
        </div>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-white border-b">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Logo</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($accreditations as $accreditation)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img class="h-10 w-10 rounded object-cover border border-[#25A8D6]" src="{{ asset('storage/' . $accreditation->image) }}" alt="{{ $accreditation->name }}">
                                </td>
                                <td class="text-left py-3 px-4">{{ $accreditation->name }}</td>
                                <td class="text-left py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $accreditation->status === 'active' ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                                        {{ ucfirst($accreditation->status) }}
                                    </span>
                                </td>
                                <td class="text-left py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.accreditations.edit', $accreditation) }}" 
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.accreditations.destroy', $accreditation) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
            </div>
        </div>
    </main>
</x-admin-layout>
