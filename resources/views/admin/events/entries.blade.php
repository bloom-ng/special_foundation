<x-admin-layout :page="'events'" :title="'Event Entries'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Entries for: {{ $event->name }}</h1>
            <div class="flex space-x-4">
                <a href="{{ url('/admin/events/'.$event->id.'/entries/download') }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Download CSV
                </a>
                <a href="{{ route('admin.events.index') }}" 
                   class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                    Back to Events
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
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Company</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Will Attend</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date Registered</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($entries as $entry)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $entry->first_name }} {{ $entry->last_name }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->email }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->company }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->phone_number }}</td>
                                <td class="text-left py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs {{ 
                                        $entry->will_attend === 'yes' ? 'bg-green-200 text-green-800' : 
                                        ($entry->will_attend === 'maybe' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') 
                                    }}">
                                        {{ ucfirst($entry->will_attend) }}
                                    </span>
                                </td>
                                <td class="text-left py-3 px-4">{{ $entry->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">No entries found for this event.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($entries->hasPages())
                <div class="mt-4">
                    {{ $entries->links() }}
                </div>
            @endif
        </div>
    </main>
</x-admin-layout>
