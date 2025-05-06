<x-guest-layout title="Special Foundation - Project Schedule" page="blog">
    <div class="relative bg-cover bg-center h-40 bg-[#26225F] bg-blend-multiply"
        style="background-image: url('{{ asset('/images/rectangle-background.png') }}');">
        <div class="h-full">
            <div
                class="h-full flex flex-row justify-center items-center text-[30px] lg:text-[48px] montserrat-bold font-extrabold text-[#25A8D6]">
                Project Schedule
            </div>
        </div>
    </div>

    <div class="flex flex-col py-20 justify-center">
        <h1 class="text-4xl montserrat-bold text-[#25A8D6] text-center">{{ $year }}</h1>

        <div class="flex lg:flex-col md:flex-col flex-col px-28 pt-20 justify-center">
            <div class="flex lg:flex-row md:flex-row flex-col w-full md:mb-20 lg:mb-20">
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3">January </br>
                    @foreach ($currentYearProjects->where('month', 1) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p class="text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">February </br>
                    @foreach ($currentYearProjects->where('month', 2) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p class="text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">March </br>
                    @foreach ($currentYearProjects->where('month', 3) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
            </div>

            <div class="flex lg:flex-row md:flex-row  flex-col w-full md:mb-20 lg:mb-20">
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    April </br>
                    @foreach ($currentYearProjects->where('month', 4) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p
                    class=" flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    May </br>
                    @foreach ($currentYearProjects->where('month', 5) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    June </br>
                    @foreach ($currentYearProjects->where('month', 6) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
            </div>

            <div class="flex lg:flex-row md:flex-row flex-col w-full md:mb-20 lg:mb-20">
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    July </br>
                    @foreach ($currentYearProjects->where('month', 7) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    August </br>
                    @foreach ($currentYearProjects->where('month', 8) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p
                    class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3  md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    September </br>
                    @foreach ($currentYearProjects->where('month', 9) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
            </div>

            <div class="flex lg:flex-row md:flex-row flex-col w-full">
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    October </br>
                    @foreach ($currentYearProjects->where('month', 10) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    November </br>
                    @foreach ($currentYearProjects->where('month', 11) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
                <p class="flex flex-col text-3xl montserrat-bold text-[#25A8D6] lg:w-1/3 md:w-1/3 lg:mt-0 md:mt-0 mt-5">
                    December </br>
                    @foreach ($currentYearProjects->where('month', 12) as $project)
                        <span
                            class="text-sm text-white montserrat-normal bg-[#26225F] lg:mr-14 md:mr-14 py-2 text-center lg:mt-5 md:mt-5 mt-5 px-2">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank"
                                    class="hover:underline">{{ $project->project }}</a>
                            @else
                                {{ $project->project }}
                            @endif
                        </span>
                    @endforeach
                </p>
            </div>
        </div>

        <div class="flex justify-between flex-col md:flex-row lg:flex-row mt-20 px-28">
            <a href="/project?year={{ $currentYear }}"
                class=" {{ $year == $currentYear ? 'invisible' : '' }}  bg-[#25A8D6] text-white text-base lg:px-5 md:px-5 rounded-full montserrat-bold py-1 lg:mb-0 md:mb-0 mb-5">
                Current Year - {{ $currentYear }}
            </a>

            <a href="/project?year={{ $nextYear }}"
                class="{{ $year == $nextYear ? 'invisible' : '' }}  bg-[#25A8D6] text-white text-base lg:px-5 md:px-5 rounded-full montserrat-bold py-1">
                Next Year - {{ $nextYear }}
            </a>
        </div>
    </div>
</x-guest-layout>
