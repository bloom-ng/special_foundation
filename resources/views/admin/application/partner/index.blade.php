<x-admin-layout title="Admin | Partner Application" page="partner">
 
    <main class="w-full flex-grow p-6">
        <h1 class="text-xl text-black pb-6">Partner Applications</h1>

        <div class="w-full mt-12">
            <p class="text-lg pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Applications
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-indigo-900 text-white">
                        <tr>
                            <th
                                class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                ID
                            </th>
                            <th
                                class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                Name
                            </th>
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                Email
                            </th>
                            
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                Contact Number
                            </th>
                            <th
                                class="text-left py-3 px-4 uppercase font-semibold text-xs"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-xs">
                        @foreach ($applications as $application)
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $application->id }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $application->name }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $application->email }}
                            </td>
                            <td class="w-1/3 text-left py-3 px-4">
                                {{ $application->contact_number }}
                            </td>
                           
                            <td class="w-1/3 text-left py-3 px-4 gap-y-1">
                                <a class="text-blue-300 hover:text-blue-500" href="/admin/beneficiaries/{{$application->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                      </svg>
                                      
                                    
                                </a>
                                <form
                                    id="partner-delete-{{$application->id}}"
                                    action="/admin/partners/{{$application->id}}"
                                    method="POST"
                                    style="display: inline"
                                >
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-300 hover:text-red-500">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <script>
                                        const form{{$application->id}} = document.getElementById('beneficiary-delete-{{$application->id}}'); 
                                      
                                        form{{$application->id}}.addEventListener('submit', (e) => {
                                          e.preventDefault(); // Prevent the form from submitting normally
                                          const confirmSubmit = confirm('Proceed to delete?');
                                          if (confirmSubmit) {
                                            form{{$application->id}}.submit(); // Submit the form if the user confirms
                                          }
                                        });
                                      </script>


                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $applications->links() }}
            </div>
        </div>
    </main>

    <script>
        const form = document.getElementById('partner-delete');
      
        form.addEventListener('submit', (e) => {
          e.preventDefault(); // Prevent the form from submitting normally
          const confirmSubmit = confirm('Proceed to delete?');
          if (confirmSubmit) {
            form.submit(); // Submit the form if the user confirms
          }
        });
      </script>

</x-admin-layout>
