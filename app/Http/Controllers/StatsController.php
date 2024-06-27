<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\StatsAggregator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $posts = Post::query()
                     ->withCount('views', 'visits')
                     ->published()
                     ->latest()
                     ->get();

        $stats = new StatsAggregator(request()->user('canvas'));

        $results = $stats->getStatsForPosts($posts, 30);

        return response()->json($results);
    }
}
