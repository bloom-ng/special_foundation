<x-admin-layout :page="'support-enquiries'" :title="'Ways to Support Enquiries'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-black pb-6">Ways to Support Enquiries</h1>
            <a href="/admin/download/SupportEnquiry/csv" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                Download CSV
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-white border-b">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Received</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Contact</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Support Type</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Date / Goal</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Message</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @forelse ($enquiries as $enquiry)
                        <tr class="border-b align-top">
                            <td class="py-3 px-4 whitespace-nowrap">{{ $enquiry->created_at?->format('d M Y') }}</td>
                            <td class="py-3 px-4">
                                {{ $enquiry->full_name }}
                                @if ($enquiry->country)
                                    <span class="block text-xs text-gray-500">{{ $enquiry->country }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="mailto:{{ $enquiry->email }}" class="text-blue-600 underline">{{ $enquiry->email }}</a>
                                @if ($enquiry->phone)
                                    <span class="block text-xs text-gray-500">{{ $enquiry->phone }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs bg-[#E9F6FB] text-[#1B7FA6]">{{ $enquiry->support_type }}</span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                {{ $enquiry->occasion_date?->format('d M Y') ?: '—' }}
                                @if ($enquiry->fundraising_goal)
                                    <span class="block text-xs text-gray-500">{{ $enquiry->fundraising_goal }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 max-w-md">{{ $enquiry->message }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('admin.support-enquiries.destroy', $enquiry) }}" method="POST" onsubmit="return confirm('Delete this enquiry?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="py-6 px-4 text-gray-500">No enquiries yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $enquiries->links() }}</div>
    </main>
</x-admin-layout>
