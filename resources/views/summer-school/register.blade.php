<x-guest-layout title="Summer School Volunteer Sign-Up" page="summer-school">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Summer School Volunteer Sign-Up
            </div>
        </div>
    </div>

    <div class="w-full py-20 px-8 lg:px-20">
        <div class="w-full max-w-4xl mx-auto">
            <div class="bg-[#25A8D6] rounded-lg p-8">
                <div class="mb-8">
                    <h1 class="text-[#26225F] text-[32px] pb-2 montserrat-bold font-extrabold">
                        Volunteer Sign-Up Form
                    </h1>
                    <div class="text-white montserrat-medium text-lg mb-8">
                        Thank you for your interest in volunteering with The Special Foundation’s Summer School Program. Please fill out the form below so we can match you with the right center and dates.
                    </div>
                    <p class="text-white montserrat-medium text-lg font-semibold">
                        Fill in the form below to sign up as a volunteer
                    </p>
                </div>

                <form method="POST" action="{{ route('summer-school.submit-registration', ['programId' => $program->id]) }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="first_name" type="text" placeholder="First Name" required />
                            @error('first_name')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="last_name" type="text" placeholder="Last Name" required />
                            @error('last_name')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="email" type="email" placeholder="Email Address" required />
                            @error('email')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="phone_number" type="text" placeholder="Phone Number" required />
                            @error('phone_number')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <input class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="profession" type="text" placeholder="Profession/Occupation" required />
                            @error('profession')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative">
                            <label class="block text-white"></label>
                            <div id="dropdown" class="w-full rounded-full px-6 py-3.5 bg-white text-black cursor-pointer" onclick="toggleDropdown()">
                                <span id="dropdown-label" class="text-sm text-gray-400">Select Preferred Volunteer Location(s)</span>
                                <span class="float-right">&#9662;</span>
                            </div>
                            <div id="dropdown-menu" class="absolute text-gray-500 z-10 bg-white border rounded shadow-lg w-full mt-1 hidden">
                                @foreach(json_decode($program->volunteer_locations, true) as $loc)
                                    <label class="block px-4 py-2 hover:bg-gray-100">
                                        <input type="checkbox" name="preferred_locations[]" value="{{ $loc }}" class="mr-2" onchange="updateDropdownLabel()">
                                        {{ $loc }}
                                    </label>
                                @endforeach
                            </div>
                            <p class="text-xs text-white pl-6 mt-1">Select one or more locations.</p>
                            @error('preferred_locations')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <script>
                        function toggleDropdown() {
                            document.getElementById('dropdown-menu').classList.toggle('hidden');
                        }
                        function updateDropdownLabel() {
                            const checked = Array.from(document.querySelectorAll('input[name="preferred_locations[]"]:checked')).map(cb => cb.value);
                            document.getElementById('dropdown-label').innerText = checked.length ? checked.join(', ') : 'Select locations';
                        }
                        document.addEventListener('click', function(e) {
                            if (!document.getElementById('dropdown').contains(e.target) && !document.getElementById('dropdown-menu').contains(e.target)) {
                                document.getElementById('dropdown-menu').classList.add('hidden');
                            }
                        });
                    </script>

                    <div>
                        <label class="block text-white mb-2">Will you be volunteering alongside children/anyone else? If yes, list their names and t-shirt size.</label>
                        <textarea class="w-full rounded-2xl px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="volunteering_with" rows="3" placeholder="List names and t-shirt sizes (if any)"></textarea>
                        @error('volunteering_with')
                            <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class=mr-4">
                            <label class="block text-white mb-2">T-shirt Size (for branded gear, if available)</label>
                            <select
                                class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F] appearance-none"
                                name="tshirt_size"
                                required
                                style="background: #fff url('data:image/svg+xml;utf8,<svg fill=\'%23666\' height=\'20\' viewBox=\'0 0 20 20\' width=\'20\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7.293 7.293a1 1 0 011.414 0L10 8.586l1.293-1.293a1 1 0 111.414 1.414l-2 2a1 1 0 01-1.414 0l-2-2a1 1 0 010-1.414z\'/></svg>') no-repeat right 1rem center / 1.5em 1.5em;"
                            >
                                <option value="">Select Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                            @error('tshirt_size')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-white mb-2">Dates Available</label>
                            <input id="available_dates" class="w-full rounded-full px-6 py-3.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#26225F]" name="available_dates" type="text" placeholder="Select your available dates" required readonly />
                            @error('available_dates')
                                <p class="text-red-800 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            flatpickr("#available_dates", {
                                mode: "multiple",
                                minDate: "{{ $program->start_date }}",
                                maxDate: "{{ $program->end_date }}",
                                dateFormat: "Y-m-d"
                            });
                        });
                    </script>

                    <div class="flex justify-center mt-8">
                        <button type="submit"
                            class="bg-[#26225F] text-white px-12 py-3 rounded-full hover:bg-opacity-90 transition-colors montserrat-medium">
                            Submit Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout> 