@extends('layouts.admin')

@section('content')
    <h1>Project Schedules</h1>

    <h2>Current Year ({{ now()->year }}) Projects</h2>
    @if($current_year->isNotEmpty())
        <ul>
            @foreach($current_year as $project)
                <li>{{ $project->project }} - {{ $project->month }}</li>
            @endforeach
        </ul>
    @else
        <p>No projects scheduled for the current year.</p>
    @endif

    <h2>Next Year ({{ now()->year + 1 }}) Projects</h2>
    @if($next_year->isNotEmpty())
        <ul>
            @foreach($next_year as $project)
                <li>{{ $project->project }} - {{ $project->month }}</li>
            @endforeach
        </ul>
    @else
        <p>No projects scheduled for next year yet.</p>
    @endif
@endsection