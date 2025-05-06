<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectSchedule;
use Carbon\Carbon;
use Illuminate\View\View;

class ProjectScheduleController extends Controller
{
    public function index()
    {
        $projects = ProjectSchedule::query()
            ->when(request()->query('search', '') != '', function ($query) {
                $query->where('project', 'like', '%' . request()->query('search') . '%');
                return $query;
            })
            ->orderBy('year', 'desc')
            ->orderBy('month', 'asc')
            ->paginate(30);

        $years = ProjectSchedule::getYears();
        $months = ProjectSchedule::getMonths();

        return view('admin.project-schedule.index', [
            'projects' => $projects,
            'years'     => $years,
            'months'    => $months
        ]);
    }

    public function create()
    {
        $years = ProjectSchedule::getYears();
        $months = ProjectSchedule::getMonths();

        return view('admin.project-schedule.create', [
            'years'     => $years,
            'months'    => $months
        ]);
    }

    public function edit(ProjectSchedule $project)
    {
        $years = ProjectSchedule::getYears();
        $months = ProjectSchedule::getMonths();

        return view('admin.project-schedule.edit', [
            'project'   => $project,
            'years'     => $years,
            'months'    => $months
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required',
            'link' => 'nullable|url',
            'year'    => 'required|integer',
            'month'   => 'required|integer|between:1,12'
        ]);

        ProjectSchedule::create($request->all());

        return back()->with('success', 'Project Created');
    }

    public function update(Request $request, ProjectSchedule $project)
    {
        $request->validate([
            'project' => 'nullable',
            'link' => 'nullable|url',
            'year' => 'nullable',
            'month' => 'nullable',
        ]);

        $project->project = $request->project ?? $project->project;
        $project->link = $request->link ?? $project->link;
        $project->year = $request->year ?? $project->year;
        $project->month = $request->month ?? $project->month;
        $project->save();

        return back()->with('success', 'Project Updated');
    }

    public function destroy(ProjectSchedule $project)
    {
        $project->delete();
        return back()->with('success', 'Project Deleted');
    }

    public function projects(): View
    {
        $currentYear = Carbon::now()->year;
        $nextYear = $currentYear + 1;

        $year = request()->query('year', $currentYear);

        $currentYearProjects = ProjectSchedule::where('year', $year)
            ->orderBy('month')
            ->get();


        return view('project', [
            'currentYearProjects'   => $currentYearProjects,
            'currentYear'   => $currentYear,
            'nextYear'      => $nextYear,
            'year'          => $year,
        ]);
    }
}
