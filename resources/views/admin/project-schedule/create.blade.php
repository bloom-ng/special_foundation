<x-admin-layout title="Admin | Add Projects" page="projects">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
            <div>
                <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                    New Project schedule
                </p>
                <p
                    class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                    Add a new project schedule
                </p>
            </div>
            <div>
                <a type="button" href="/admin/project-schedules"
                    class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                    type="button" data-ripple-light="true">
                    Project Schedules
                </a>
            </div>

        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                </p>
                <div class="leading-loose">
                    <form class="" method="POST" action="/admin/project-schedules" enctype="multipart/form-data">
                        @csrf

                        <div class="pb-2">
                            @error('project')
                                <div class="text-red-500">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <label class=" block  text-sm pb-1" for="project">Project</label>
                            <input
                                class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 "
                                id="project" name="project" type="text" required
                                placeholder="Project name i.e School Build Program" aria-label="Project">
                        </div>

                        <div class="pb-2">
                            @error('year')
                                <div class="text-red-500">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <label class="block text-sm pb-1" for="year">Year</label>
                            <select
                                class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                id="year" name="year" required aria-label="Year">
                                <option value="">Select Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pb-2">
                            @error('month')
                                <div class="text-red-500">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <label class="block text-sm pb-1" for="month">Month</label>
                            <select
                                class="px-2 block ring-1 ring-inset ring-gray-300 w-full border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                id="month" name="month" required aria-label="Month">
                                <option value="">Select Month</option>
                                @foreach ($months as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="link" class="block text-sm font-medium text-gray-700">Project Link
                                (Optional)</label>
                            <input type="url" name="link" id="link"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="https://example.com">
                        </div>

                        <div class="mt-6">
                            <button
                                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>




</x-admin-layout>
