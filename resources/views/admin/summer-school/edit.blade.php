<x-admin-layout :page="'summer-school'" :title="'Edit Summer School Program'">
    <main class="w-full flex-grow p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl text-black pb-6">Edit Summer School Program</h1>
            <a href="{{ url('/admin/summer-school') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                Back to Programs
            </a>
        </div>

        <div class="w-full mt-6">
            <form action="{{ route('admin.summer-school.update', $program) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="banner">
                            Banner Image
                        </label>
                        @if($program->banner)
                            <div class="mt-2">
                                <img src="{{ Storage::url($program->banner) }}" alt="Banner" class="max-w-xs">
                            </div>
                        @endif
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('banner') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                               id="banner" 
                               type="file" 
                               name="banner"
                               accept="image/*">
                        <p class="text-sm text-gray-500 mt-1">Recommended dimensions: 1200x630 pixels (16:9 ratio) for optimal display</p>
                        @error('banner')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6 flex space-x-4">
                        <div class="flex-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="start_date">
                                Start Date
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('start_date') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                                   id="start_date" 
                                   type="date" 
                                   name="start_date"
                                   value="{{ old('start_date', $program->start_date) }}"
                                   required>
                            @error('start_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="end_date">
                                End Date
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('end_date') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                                   id="end_date" 
                                   type="date" 
                                   name="end_date"
                                   value="{{ old('end_date', $program->end_date) }}"
                                   required>
                            @error('end_date')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="volunteer_locations">
                            Volunteer Locations
                        </label>
                        <div id="locations-list" class="flex flex-wrap gap-2 mb-2"></div>
                        <div class="flex gap-2">
                            <input id="location-input" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" placeholder="Type a location and press Add">
                            <button type="button" id="add-location-btn" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
                        </div>
                        <input type="hidden" name="volunteer_locations" id="volunteer_locations_hidden">
                        <p class="text-sm text-gray-500 mt-1">Type a location and click Add. You can add as many as needed.</p>
                        @error('volunteer_locations')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">
                            Status
                        </label>
                        <select class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('status') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" 
                                id="status" 
                                name="status"
                                required>
                            <option value="inactive" {{ old('status', $program->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="active" {{ old('status', $program->status) == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('admin.summer-school.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 mr-2">Cancel</a>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Update Program
                    </button>
                </div>
            </form>
        </div>
    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let locations = @json(old('volunteer_locations', json_decode($program->volunteer_locations, true)));
        const input = document.getElementById('location-input');
        const addBtn = document.getElementById('add-location-btn');
        const list = document.getElementById('locations-list');
        const hidden = document.getElementById('volunteer_locations_hidden');

        function renderLocations() {
            list.innerHTML = '';
            locations.forEach((loc, idx) => {
                const tag = document.createElement('span');
                tag.className = 'bg-blue-200 text-blue-800 px-3 py-1 rounded-full flex items-center gap-2';
                tag.innerHTML = `${loc} <button type='button' onclick='removeLocation(${idx})' class='ml-2 text-red-600'>&times;</button>`;
                list.appendChild(tag);
            });
            hidden.value = JSON.stringify(locations);
        }
        window.removeLocation = function(idx) {
            locations.splice(idx, 1);
            renderLocations();
        }
        addBtn.onclick = function() {
            const val = input.value.trim();
            if (val && !locations.includes(val)) {
                locations.push(val);
                input.value = '';
                renderLocations();
            }
        };
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addBtn.click();
            }
        });
        // On submit, ensure at least one location
        document.querySelector('form').addEventListener('submit', function(e) {
            if (locations.length === 0) {
                e.preventDefault();
                alert('Please add at least one location.');
            }
        });
        renderLocations();
    });
    </script>
</x-admin-layout> 