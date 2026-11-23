<x-admin-layout :page="'awards'" :title="'Awards and Recognition'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Awards and Recognition</h1>
            <div class="flex space-x-4">
                <a href="{{ route('admin.awards.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Create New Award
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">
                These appear on the homepage between the impact figures and Our Programs. Items are shown in
                <strong>Display Order</strong> (lowest number first) within their group. The footer accreditation list is
                managed separately under Accreditations.
            </span>
        </div>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-white border-b">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Order</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Badge</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Year</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Group</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Link</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Visible</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($awards as $award)
                            <tr class="border-b">
                                <td class="text-left py-3 px-4">{{ $award->sort_order }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img class="h-10 w-10 rounded object-contain border border-[#25A8D6] bg-white"
                                         src="{{ asset('storage/' . $award->image) }}"
                                         alt="{{ $award->name }}">
                                </td>
                                <td class="text-left py-3 px-4">{{ $award->name }}</td>
                                <td class="text-left py-3 px-4">{{ $award->year ?: '—' }}</td>
                                <td class="text-left py-3 px-4">{{ $award->categoryLabel() }}</td>
                                <td class="text-left py-3 px-4">{{ $award->recognition ?: '—' }}</td>
                                <td class="text-left py-3 px-4">
                                    @if ($award->link)
                                        <a href="{{ $award->link }}" target="_blank" rel="noopener noreferrer"
                                           class="text-blue-600 underline">Open</a>
                                    @else
                                        <span class="text-gray-400">None</span>
                                    @endif
                                </td>
                                <td class="text-left py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $award->status === 'active' ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                                        {{ ucfirst($award->status) }}
                                    </span>
                                </td>
                                <td class="text-left py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.awards.edit', $award) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.awards.destroy', $award) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-left py-6 px-4 text-gray-500">
                                    No awards yet. Use <strong>Create New Award</strong> to add the first one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-admin-layout>
