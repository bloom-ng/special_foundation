<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StatsAggregator;
use App\Models\Post;

class DashboardController extends Controller
{
    public function show()
    {

        $last_month_subscribers = \App\Models\Newsletter::whereMonth('created_at', now()->subMonth()->month)->count();
        $current_month_subscribers = \App\Models\Newsletter::whereMonth('created_at', now()->month)->count();

        $subStats = $this->getMonthStat($current_month_subscribers, $last_month_subscribers);

        $last_month_beneficiaries = \App\Models\BeneficiaryApplication::whereMonth('created_at', now()->subMonth()->month)->count();
        $current_month_beneficiaries = \App\Models\BeneficiaryApplication::whereMonth('created_at', now()->month)->count();

        $beneficiaryStats = $this->getMonthStat($current_month_beneficiaries, $last_month_beneficiaries);

        $stats = new StatsAggregator(request()->user());

        $results = $stats->getStatsForPosts(Post::published()->get(), 30);
        $results90 = $stats->getStatsForPosts(Post::published()->get(), 90);
        $results180 = $stats->getStatsForPosts(Post::published()->get(), 180);
        $results365 = $stats->getStatsForPosts(Post::published()->get(), 365);

        

        return view("admin.dashboard", [
            "subscribers" => \App\Models\Newsletter::count(),
            "subStats" => $subStats,
            "beneficiaries" => \App\Models\BeneficiaryApplication::count(),
            "beneficiaryStats" => $beneficiaryStats,
            "posts" => \App\Models\Post::published()->count(),
            "latest_posts" => \App\Models\Post::published()->latest()->take(2)->get(),
            "documents" => \App\Models\Download::count(),
            "postStats" => $results,
            "postStats90" => $results90,
            "postStats180" => $results180,
            "postStats365" => $results365
        ]);
    }

    protected function getMonthStat($current_month = 0, $last_month = 0.0000001)
    {
        $current_month = $current_month ?? 0.001;
        $is_up = $current_month > $last_month;
        $up_by = 0;
        if ($last_month != 0) {
            $up_by = (abs(($current_month - $last_month)) / $last_month) * 100;
        }

        return [
            "is_up" => $is_up,
            "up_by" => round($up_by, 2),
        ];
    }
}
