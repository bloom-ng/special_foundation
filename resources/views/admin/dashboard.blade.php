
<x-admin-layout>
 
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>

        <div class="flex flex-wrap mt-6">
            <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-plus mr-3"></i> Monthly Reports
                </p>
                <div class="p-6 bg-white">
                    <canvas
                        id="chartOne"
                        width="400"
                        height="200"
                    ></canvas>
                </div>
            </div>
            <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-check mr-3"></i> Resolved
                    Reports
                </p>
                <div class="p-6 bg-white">
                    <canvas
                        id="chartTwo"
                        width="400"
                        height="200"
                    ></canvas>
                </div>
            </div>
        </div>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Latest Reports
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th
                                class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm"
                            >
                                ID
                            </th>
                            <th
                                class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm"
                            >
                                Name
                            </th>
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-sm"
                            >
                                Email
                            </th>
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-sm"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($newsletters as $newsletter)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $newsletter->id }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $newsletter->name }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $newsletter->email }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $newsletter->created_at }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $newsletter->updated_at }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                <a href="#">Show</a>
                                <a href="#">Edit</a>
                                <form
                                    action="#"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf @method('DELETE')
                                    <button type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</x-admin-layout> 