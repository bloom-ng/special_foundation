<x-admin-layout title="Admin | View Application" page="partner">

    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">View Partner Application</h1>

      

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <div class="flex items-center">
                        <div class="w-1/2 text-lg font-semibold">Name</div>
                       <div class="flex  "> 
                            {{ $application->name }} 
                            {{-- add copy svg     --}}
                            <svg onclick="copyToClipboard('{{ $application->name }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer w-3 h-3 ml-1">
                                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2 text-lg font-semibold">Email</div>
                       <div class="flex  "> 
                            {{ $application->email }}
                            {{-- add copy svg     --}}
                            <svg onclick="copyToClipboard('{{ $application->email }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer w-3 h-3 ml-1">
                                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-1/2 text-lg font-semibold">Contact Number</div>
                       <div class="flex  "> 
                            {{ $application->contact_number }} 
                            {{-- add copy svg     --}}
                            <svg onclick="copyToClipboard('{{ $application->contact_number }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer w-3 h-3 ml-1">
                                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-1/2 text-lg font-semibold">Area of Residence</div>
                       <div class="flex  "> 
                            {{ $application->area_of_residence }} 
                            {{-- add copy svg     --}}
                            <svg onclick="copyToClipboard('{{ $application->area_of_residence }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer w-3 h-3 ml-1">
                                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                    </div>

                   
                    <div class="flex items-center">
                        <div class="w-1/2 text-lg font-semibold">Purpose of Application</div>
                       <div class="flex  "> 
                            {{ $application->purpose_of_application }}
                            {{-- add copy svg     --}}
                            <svg onclick="copyToClipboard('{{ $application->area_of_residence }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cursor-pointer w-3 h-3 ml-1">
                                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2" />
                            </svg>
                        </div>
                    </div>
                   
            
                </div>
            </div>

           
        </div>

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