<x-admin-layout :page="'events'" :title="'Events'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Events</h1>
            <div class="flex space-x-4">
                <a href="{{ route('admin.events.download-csv') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Download CSV
                </a>
                <a href="{{ route('admin.events.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    Create New Event
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-white border-b">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($events as $event)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-20 w-20">
                                            <img class="h-20 w-20 rounded-lg object-cover" src="{{ Storage::url($event->image) }}" alt="{{ $event->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $event->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-left py-3 px-4">{{ $event->date }}</td>
                                <td class="text-left py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs {{ $event->status === 'active' ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td class="text-left py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ url('/admin/events/'.$event->id.'/edit') }}" 
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Edit
                                        </a>
                                        <form action="{{ url('/admin/events/'.$event->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                                    onclick="return confirm('Are you sure?')">
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
