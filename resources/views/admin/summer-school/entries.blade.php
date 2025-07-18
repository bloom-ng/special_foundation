<x-admin-layout :page="'summer-school'" :title="'Volunteer Entries'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Volunteers for: {{ $program->start_date }} - {{ $program->end_date }}</h1>
            <div class="flex space-x-4">
                <a href="{{ url('/admin/summer-school/'.$program->id.'/entries/download') }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Download CSV
                </a>
                <a href="{{ route('admin.summer-school.index') }}" 
                   class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
                    Back to Programs
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
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Profession</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Preferred Locations</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Volunteering With</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">T-shirt Size</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Available Dates</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date Registered</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse($entries as $entry)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $entry->first_name }} {{ $entry->last_name }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->email }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->phone_number }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->profession }}</td>
                                <td class="text-left py-3 px-4">
                                    @foreach(json_decode($entry->preferred_locations, true) as $loc)
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">{{ $loc }}</span>
                                    @endforeach
                                </td>
                                <td class="text-left py-3 px-4">{{ $entry->volunteering_with }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->tshirt_size }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->available_dates }}</td>
                                <td class="text-left py-3 px-4">{{ $entry->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-gray-500">No volunteers found for this program.</td>
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