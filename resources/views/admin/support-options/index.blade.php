<x-admin-layout :page="'support-options'" :title="'Ways to Support Cards'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Ways to Support Cards</h1>
            <a href="{{ route('admin.support-options.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Create New Card
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">
                These are the cards on <a href="/ways-to-support" target="_blank" class="underline">/ways-to-support</a>.
                Cards are shown in <strong>Display Order</strong> within their group. A card with no image shows an
                &ldquo;Image to follow&rdquo; placeholder.
            </span>
        </div>

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-white border-b">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Order</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Image</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Group</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Button</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Shown</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($options as $option)
                        @php $isActive = $option->status === 'active'; @endphp
                        <tr class="border-b">
                            <td class="text-left py-3 px-4">{{ $option->sort_order }}</td>
                            <td class="py-3 px-4">
                                @if ($option->image)
                                    <img class="h-10 w-16 rounded object-cover border border-[#25A8D6]"
                                         src="{{ asset('storage/' . $option->image) }}" alt="{{ $option->title }}">
                                @else
                                    <span class="text-xs text-gray-400">none</span>
                                @endif
                            </td>
                            <td class="text-left py-3 px-4">{{ $option->title }}</td>
                            <td class="text-left py-3 px-4">{{ $option->groupLabel() }}</td>
                            <td class="text-left py-3 px-4">
                                <span class="block">{{ $option->button_label }}</span>
                                <span class="block text-xs text-gray-500 break-all">{{ $option->button_url }}</span>
                            </td>
                            <td class="text-left py-3 px-4">
                                <form action="{{ route('admin.support-options.toggle', $option) }}" method="POST">
                                    @csrf
                                    <button type="submit" role="switch" aria-checked="{{ $isActive ? 'true' : 'false' }}"
                                        aria-label="{{ $isActive ? 'Hide' : 'Show' }} {{ $option->title }}"
                                        class="group inline-flex items-center gap-2 focus:outline-none">
                                        <span class="relative inline-flex h-5 w-9 shrink-0 items-center rounded-full transition-colors {{ $isActive ? 'bg-green-500' : 'bg-gray-300' }}">
                                            <span class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform {{ $isActive ? 'translate-x-4' : 'translate-x-1' }}"></span>
                                        </span>
                                        <span class="text-xs {{ $isActive ? 'text-green-700' : 'text-gray-500' }}">
                                            {{ $isActive ? 'Shown' : 'Hidden' }}
                                        </span>
                                    </button>
                                </form>
                            </td>
                            <td class="text-left py-3 px-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.support-options.edit', $option) }}"
                                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                                    <form action="{{ route('admin.support-options.destroy', $option) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="py-6 px-4 text-gray-500">No cards yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</x-admin-layout>
