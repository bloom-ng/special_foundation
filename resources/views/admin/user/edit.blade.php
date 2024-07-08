<x-admin-layout title="Admin | Edit User" page="users">

    <main class="w-full flex-grow p-6">
        <div class="flex justify-between md:items-center gap-y-4 flex-col md:flex-row w-full">
            <div>
                <p class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-bold">
                    Edit User
                </p>
                <p
                    class="block antialiased text-sm font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                    Edit  {{$user->name}}
                </p>
            </div>
            <div>
                <a type="button" href="/admin/users"
                    class="align-middle select-none font-sans font-bold text-center capitalize transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-indigo-500 hover:bg-indigo-400 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-indigo-500"
                    type="button" data-ripple-light="true">
                    User List
                </a>
            </div>

        </div>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <p class="text-xl pb-6 flex items-center">
                </p>
                <div class="leading-loose">
                    <form class="" method="POST" action="/admin/users/{{$user->id}}" >
                        @method('PUT')
                        @csrf
                        <div class="sm:col-span-4 ">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                              <input id="name" name="name" type="text" value="{{$user->name}}" required autocomplete="text"
                                        class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-4 mt-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                              <input id="email" name="email" type="email" value="{{$user->email}}" required autocomplete="email"
                                    class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-4 mt-4">
                            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <button id="ask-ai" type="button" class="text-indigo-500"> Ask Ai <i class="fas fa-robot"></i> 
                                <span id="ai-loader" class="hidden pl-2">  
                                    <i class="fas fa-spinner fa-spin"></i> 
                                </span>
                            </button> 
                            <span class="ml-2 text-indigo-600" id="generated-password"></span>
                            <div class="mt-2">
                              <input id="password" name="password" type="password"   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="sm:col-span-4 mt-4">
                            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                            <div class="mt-2">
                              <input id="password_confirmation" name="password_confirmation" type="password"   class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                       

                        

                        <div class="mt-6">
                            <button class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" 
                                    type="submit">Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

           
        </div>


        <script>

                const aiBtn = document.getElementById('ask-ai');
                aiBtn.addEventListener('click', async (e) => {
                    e.preventDefault();
                    document.getElementById('ai-loader').classList.remove('hidden');

                    const messages = [
                        {
                            role: 'system',
                            content: `You are a cybersecurity expert.
                            Generate a very strong random password for the user with between 8-12 characters including numbers, letters, mixed case in no particular order.
                            Make it random but easy to remember
                            Do not explain anything.

                            Use the following characters:
                            A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z
                            a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z
                            0, 1, 2, 3, 4, 5, 6, 7, 8, 9
                            !, @, #, $, %, ^, &, *, (, ), _, -,

                            `
                        },
                        {
                            role: 'user',
                            content: ` Generate `
                        }
                    ];
                    const response = await callChatAPI(messages);
                    document.getElementById('ai-loader').classList.add('hidden');
                    document.getElementById('generated-password').innerText = response.choices[0].message.content;
                });

                async function callChatAPI(messages, model, temperature) {
                    const url = '/api/chat'; // assume the API route is on the same origin
                    const headers = {
                        'Content-Type': 'application/json'
                    };
                    const data = {
                        model: model || 'gpt-3.5-turbo',
                        temperature: temperature || 0.9,
                        messages: messages || []
                    };

                    const response = await fetch(url, {
                        method: 'POST',
                        headers,
                        body: JSON.stringify(data)
                    });

                    const responseBody = await response.json();
                    return responseBody;
                }
            </script>


  
</x-admin-layout> 