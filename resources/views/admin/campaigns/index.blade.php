<x-admin-layout :page="'campaigns'" :title="'Campaigns'">

    <main class="w-full flex-grow p-6">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl pb-6">Campaigns</h1>

            <a href="{{ route('admin.campaigns.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Create New Campaign
            </a>
        </div>

       
        <div class="w-full mt-6">
            <div class="bg-white overflow-auto rounded-lg shadow">

                <table class="min-w-full bg-white">

                    {{-- HEAD --}}
                    <thead class="border-b bg-gray-50">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase text-sm">Title</th>
                            <th class="text-left py-3 px-4 uppercase text-sm">Slug</th>
                            <th class="text-left py-3 px-4 uppercase text-sm">Menu</th>
                            <th class="text-left py-3 px-4 uppercase text-sm">Countdown</th>
                            <th class="text-left py-3 px-4 uppercase text-sm">Actions</th>
                        </tr>
                    </thead>

                    {{-- BODY --}}
                    <tbody class="text-gray-700">

                        @forelse($campaigns as $campaign)
                            <tr class="border-b hover:bg-gray-50">

                                {{-- TITLE + IMAGE --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center">

                                        <div class="h-16 w-16 flex-shrink-0">
                                            @if($campaign->hero_image)
                                                <img class="h-16 w-16 rounded object-cover"
                                                     src="{{ Storage::url($campaign->hero_image) }}">
                                            @else
                                                <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center text-xs">
                                                    No Image
                                                </div>
                                            @endif
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">
                                                {{ $campaign->title }}
                                            </div>
                                        </div>

                                    </div>
                                </td>

                                {{-- SLUG --}}
                                <td class="py-3 px-4 text-sm">
                                    /campaigns/{{ $campaign->slug }}
                                </td>

                                {{-- MENU STATUS --}}
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs
                                        {{ $campaign->show_in_menu ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                                        {{ $campaign->show_in_menu ? 'Visible' : 'Hidden' }}
                                    </span>
                                </td>

                                {{-- COUNTDOWN --}}
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs
                                        {{ $campaign->show_countdown ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800' }}">
                                        {{ $campaign->show_countdown ? 'Enabled' : 'Off' }}

                                    </span>
                                    <br>
                                    @if($campaign->show_countdown && $campaign->countdown_date)
                                        <span class="text-xs text-gray-600">
                                            ({{ $campaign->countdown_date->format('M d, Y H:i') }})
                                        </span>
                                    @endif
                                </td>

                                {{-- ACTIONS --}}
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">

                                        {{-- VIEW --}}
                                        <a href="{{ url('/campaigns/'.$campaign->slug) }}"
                                           target="_blank"
                                           class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                                            View
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.campaigns.edit', $campaign->id) }}"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                            Edit
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this campaign?')"
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500">
                                    No campaigns created yet.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>

    </main>
</x-admin-layout>