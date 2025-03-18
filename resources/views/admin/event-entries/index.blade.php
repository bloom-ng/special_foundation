<x-admin-layout :page="'event-entries'" :title="'Event Entries'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Event Entries</h2>
            <div class="flex gap-4">
                <a href="{{ route('admin.event-entries.download-csv') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Download CSV
                </a>
            </div>
        </div>

        <div class="w-full mt-6">
            <div class="bg-white overflow-auto rounded-lg shadow-md">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full h-16 border-gray-300 border-b py-8 bg-gray-100">
                            <th class="text-left pl-8">Event</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Phone</th>
                            <th class="text-left">Company</th>
                            <th class="text-left">Will Attend</th>
                            <th class="text-left">Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $entry)
                            <tr class="h-16 border-gray-300 border-b">
                                <td class="pl-8">{{ $entry->event ? $entry->event->name : 'Event Deleted' }}</td>
                                <td>{{ $entry->first_name }} {{ $entry->last_name }}</td>
                                <td>{{ $entry->email }}</td>
                                <td>{{ $entry->phone_number }}</td>
                                <td>{{ $entry->company ?: 'Not provided' }}</td>
                                <td>{{ $entry->will_attend ? 'Yes' : 'No' }}</td>
                                <td>{{ $entry->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $entries->links() }}
            </div>
        </div>
    </main>
</x-admin-layout>
