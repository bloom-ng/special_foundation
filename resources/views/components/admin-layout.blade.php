<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description" content="" />

    <!-- Tailwind --><!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Karla:400,700&display=swap");

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #a0abd4;
        }

        .nav-item:hover {
            background: #a0abd4;
        }

        .account-link:hover {
            background: #6366F1;
        }


        /* SCROLLBAR */

        ::-webkit-scrollbar {
        width: 7px; /* Width of the scrollbar */
        height: 7px; /* Height of the scrollbar */
        }

        ::-webkit-scrollbar-thumb {
        background-color: #ccc; /* Color of the scrollbar thumb */
        border-radius: 10px; /* Rounded corners */
        }

        ::-webkit-scrollbar-track {
        background-color: #f1f1f1; /* Color of the scrollbar track */
        border-radius: 10px; /* Rounded corners */
        }

        ::-webkit-scrollbar-thumb:hover {
        background-color: #aaa; /* Color of the scrollbar thumb on hover */
        }

        ::-webkit-scrollbar-thumb:active {
        background-color: #999; /* Color of the scrollbar thumb on active */
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">
    <aside class="relative bg-indigo-600 max-h-screen overflow-y-auto w-64 hidden sm:block shadow-xl">
        <div class="p-6 overflow-y-auto">
            <a href="/admin/dashboard" class="text-white text-xl font-semibold uppercase hover:text-gray-300"><img
                    class="w-12 lg:w-16" src="/images/the-special-youth-leadership-foundation-03.png"
                    alt="" /></a>

        </div>
        <nav class="text-white text-xs font-semibold pt-3">
            <a href="/admin/dashboard"
                class="flex items-center {{ $page == 'dashboard' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/admin/newsletters"
                class="flex items-center {{ $page == 'newsletter' ? 'active-nav-link' : '' }} text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Newsletter Subscribers
            </a>
            <a href="/admin/blogs"
                class="flex items-center {{ $page == 'blogs' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-file mr-3"></i>
                Posts
            </a>
            <a href="/admin/downloads"
                class="flex items-center {{ $page == 'downloads' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-download mr-3"></i>
                Documents
            </a>
            <a href="/admin/galleries"
                class="flex items-center {{ $page == 'gallery' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-images mr-3"></i>
                Gallery
            </a>
            <a href="/admin/beneficiaries"
                class="flex items-center {{ $page == 'beneficiary' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-file-invoice mr-3"></i>
                Beneficiary Applications
            </a>
            <a href="/admin/partners"
                class="flex items-center {{ $page == 'partner' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-file-invoice mr-3"></i>
                Partner Applications
            </a>
            <a href="/admin/donation-leads"
                class="flex items-center {{ $page == 'donation' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-money-bill-wave mr-3"></i>
                Prospective Donors
            </a>
            <a href="/admin/volunteers"
                class="flex items-center {{ $page == 'volunteer' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-file-invoice mr-3"></i>
                Prospective Volunteers
            </a>
            <a href="/admin/project-schedules"
                class="flex items-center {{ $page == 'projects' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-calendar-alt mr-3"></i>
                Project Schedules
            </a>
            <a href="/admin/cms-data/teams"
                class="flex items-center {{ $page == 'cms-teams' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-users mr-3"></i>
                The Team
            </a>
            <a href="/admin/cms-data/partners"
                class="flex items-center {{ $page == 'cms-partners' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-images mr-3"></i>
                Partners Logo
            </a>
            <a href="{{ route('admin.events.index') }}"
                class="flex items-center text-white py-4 pl-6 nav-item {{ $page === 'events' ? 'active-nav-link' : '' }}">
                <i class="fas fa-calendar mr-3"></i>
                Events
            </a>
            <a href="{{ route('admin.summer-school.index') }}"
                class="flex items-center text-white py-4 pl-6 nav-item {{ $page === 'summer-school' ? 'active-nav-link' : '' }}">
                <i class="fas fa-sun mr-3"></i>
                Summer School
            </a>
            <!-- <a href="{{ route('admin.event-entries.index') }}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{ $page === 'event-entries' ? 'active-nav-link' : '' }}">
                <i class="fas fa-users mr-3"></i>
                Event Entries
            </a> -->
            <a href="/admin/cms-data/ai/edit"
                class="flex items-center {{ $page == 'cms-ai' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-info mr-3"></i>
                Chatbot Additional Knowledge
            </a>
           
            <a href="/admin/users"
                class="flex items-center {{ $page == 'users' ? 'active-nav-link' : '' }} text-white py-4 pl-6 nav-item">
                <i class="fas fa-users mr-3"></i>
                Users
            </a>

        </nav>

    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2">
                @if (session('success'))
                    <div class="bg-green-400 font-semibold text-gray-50 p-2">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-400 font-semibold text-gray-50 p-2">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="text-red-400 p-2 text-xs font-extralight">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img
                        src="https://ui-avatars.com/api/?color=6c5ce7&background=fff&name={{ auth()->user()->name }}" />
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="/admin/users/edit/me" class="block px-4 py-2 account-link hover:text-white ">Account</a>
                    <div class="px-4 py-2 account-link hover:text-white">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                            Sign Out
                        </a>
                    </div>


                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-indigo-600 py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="/index" class="text-white text-3xl font-semibold uppercase hover:text-gray-300"><img
                        class="w-12 lg:w-16" src="/images/the-special-youth-leadership-foundation-03.png"
                        alt="" /></a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">

                <a href="/admin/dashboard"
                    class="flex items-center {{ $page == 'dashboard' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="/admin/newsletters"
                    class="flex items-center {{ $page == 'newsletter' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-newspaper mr-3"></i>
                    Newsletter Subscribers
                </a>
                <a href="/admin/blogs"
                    class="flex items-center {{ $page == 'blogs' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-file mr-3"></i>
                    Posts
                </a>
                <a href="/admin/downloads"
                    class="flex items-center {{ $page == 'downloads' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-download mr-3"></i>
                    Documents
                </a>
                <a href="/admin/galleries"
                    class="flex items-center {{ $page == 'gallery' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-images mr-3"></i>
                    Gallery
                </a>
                <a href="/admin/beneficiaries"
                    class="flex items-center {{ $page == 'beneficiary' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-file-invoice mr-3"></i>
                    Beneficiary Applications
                </a>
                <a href="/admin/partners"
                    class="flex items-center {{ $page == 'partner' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-file-invoice mr-3"></i>
                    Partner Applications
                </a>
                <a href="/admin/donation-leads"
                    class="flex items-center {{ $page == 'donation' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-money-bill-wave mr-3"></i>
                    Prospective Donors
                </a>
                <a href="/admin/project-schedules"
                    class="flex items-center {{ $page == 'projects' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Project Schedules
                </a>
                <a href="/admin/cms-data/teams"
                    class="flex items-center {{ $page == 'cms-teams' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    The Team
                </a>
                <a href="/admin/cms-data/partners"
                    class="flex items-center {{ $page == 'cms-partners' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-images mr-3"></i>
                    Partners logo
                </a>
                <a href="{{ route('admin.events.index') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item {{ $page === 'events' ? 'active-nav-link' : '' }}">
                    <i class="fas fa-calendar mr-3"></i>
                    Events
                </a>
                <!-- <a href="{{ route('admin.event-entries.index') }}"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item {{ $page === 'event-entries' ? 'active-nav-link' : '' }}">
                    <i class="fas fa-users mr-3"></i>
                    Event Entries
                </a> -->
                <a href="/admin/cms-data/ai/edit"
                    class="flex items-center {{ $page == 'cms-ai' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-info mr-3"></i>
                    Chatbot Additional Knowledge
                </a>

                <a href="/admin/users"
                    class="flex items-center {{ $page == 'users' ? 'active-nav-link' : '' }} text-white py-2 pl-4 nav-item">
                    <i class="fas fa-users mr-3"></i>
                    Users
                </a>


                <a href="/admin/users/edit/me"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>

            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
        <div class="w-full overflow-x-hidden border-t flex flex-col bg-white">

            {{ $slot }}


        </div>


    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById("chartOne");
        var myChart = new Chart(chartOne, {
            type: "bar",
            data: {
                labels: [
                    "Red",
                    "Blue",
                    "Yellow",
                    "Green",
                    "Purple",
                    "Orange",
                ],
                datasets: [{
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }, ],
                },
            },
        });

        var chartTwo = document.getElementById("chartTwo");
        var myLineChart = new Chart(chartTwo, {
            type: "line",
            data: {
                labels: [
                    "Red",
                    "Blue",
                    "Yellow",
                    "Green",
                    "Purple",
                    "Orange",
                ],
                datasets: [{
                    label: "# of Votes",
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                }, ],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        },
                    }, ],
                },
            },
        });
    </script>
</body>

</html>
