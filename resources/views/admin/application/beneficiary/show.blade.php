<x-admin-layout title="Admin | View Application" page="beneficiary">

    <main class="w-full flex-grow p-6">
        <div>
            <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
                <div>
                    <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                        Beneficiary Applicant Details
                    </p>
                    <p
                        class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                        Personal details and application
                    </p>
                </div>
                <div>
                    <a type="button" href="/admin/beneficiaries"
                        class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                        type="button" data-ripple-light="true">
                        Applicants List
                    </a>
                </div>

            </div>




            <div class="mt-6 border-t border-gray-100">
                
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $application->name }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Contact Number</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->contact_number }} </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email </dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->email }} </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Programme</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $programmeMapping[$application->programme] }} </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Area of Residence</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->area_of_residence }} </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Date of Birth</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ \Carbon\Carbon::parse($application->date_of_birth)->format("d M Y") }}
                            ({{ \Carbon\Carbon::parse($application->date_of_birth)->age }} years)
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Gender</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->gender ?? "—" }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">State of Origin</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->state_of_origin ?? "—" }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">School</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->school_name ?? "—" }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Class / Grade</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->class_grade ?? "—" }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Father’s Occupation</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->father_occupation ?? "—" }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Mother’s Occupation</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->mother_occupation ?? "—" }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Beneficiary Image</dt>
                        <dd class="mt-1 sm:col-span-2 sm:mt-0">
                            @if ($application->beneficiary_image)
                                <img src="{{ asset("storage/" . $application->beneficiary_image) }}"
                                    class="w-48 h-48 object-cover rounded-xl border shadow-md" alt="Beneficiary Image">
                            @else
                                <span class="text-gray-500 text-sm">No image uploaded</span>
                            @endif
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Purpose of Application</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $application->purpose_of_application }} </dd>
                    </div>

                </dl>
            </div>
        </div>
    </main>


    <script>
        function copyToClipboard(text) {
            var copyText = document.createElement("textarea");
            copyText.value = text;
            document.body.appendChild(copyText);
            copyText.select();
            document.execCommand("copy");
            copyText.remove();
        }
    </script>

</x-admin-layout>
