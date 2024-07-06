<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use App\Services\StatsAggregator;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

$uuid = Str::uuid()->toString();

class PostController extends Controller
{
    /**
     * Display a listing of the blogs.
     *
     * 
     */
    public function index()
    {
        $posts = Post::query()
                    //  ->when(request()->query('type', 'published') != 'draft', function (Builder $query) {
                    //      return $query->published();
                    //  }, function (Builder $query) {
                    //      return $query->draft();
                    //  })
                   
                     ->latest()

                     ->withCount('views')
                     ->paginate();

        $draftCount = Post::query()
                          ->draft()
                          ->count();

        $publishedCount = Post::query()
                              ->published()
                              ->count();


        return view('admin.blog.index', [
            'posts' => $posts,
            'draftCount' => $draftCount,
            'publishedCount' => $publishedCount,
        ]);
    }

    /**
     * Show the form for creating a new blog.
     *
     * 
     */
    public function create()
    {
        $uuid = Str::uuid();
        $post = new Post([
            "id" => $uuid->toString()
        ]);

        return view('admin.blog.create', [
            'post' => $post,
            'slug' => "post-{$uuid->toString()}",
            'tags' => Tag::query()->get(['name', 'slug']),
            'topics' => Topic::query()->get(['name', 'slug']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostRequest  $request
     * @param $id
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function store(PostRequest $request, $id)
    {
        $data = $request->validated();

        $post = Post::query()
                    ->with('tags', 'topic')
                    ->find($id);

        if (! $post) {
            $post = new Post([
                'id' => $id,
                'slug' => Str::slug($data['title']) . "-" . Str::random(3),
            ]);
        }

        $post->fill($data);

        $post->user_id = $post->user_id ?? request()->user()->id;

        // Add images
        $url = $request->file('featured_image');
        $path = $request->file('featured_image')->storeAs('public/posts', $url->getClientOriginalName());
        $post->featured_image = $path;

        $post->save();

        $tags = Tag::query()->get(['id', 'name', 'slug']);
        $topics = Topic::query()->get(['id', 'name', 'slug']);

        $tagsToSync = collect($request->input('tags', []))->map(function ($item) use ($tags) {
            $tag = $tags->firstWhere('slug', $item['slug']);

            if (! $tag) {
                $tag = Tag::create([
                    'id' => Uuid::uuid4()->toString(),
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'user_id' => request()->user()->id,
                ]);
            }

            return (string) $tag->id;
        })->toArray();

        $topicToSync = collect($request->input('topic', []))->map(function ($item) use ($topics) {
            $topic = $topics->firstWhere('slug', $item['slug']);

            if (! $topic) {
                $topic = Topic::create([
                    'id' => Uuid::uuid4()->toString(),
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'user_id' => request()->user()->id,
                ]);
            }

            return (string) $topic->id;
        })->toArray();

        $post->tags()->sync($tagsToSync);

        $post->topic()->sync($topicToSync);
        
        return back()->with('success', 'Action Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * 
     */
    public function show($id)
    {
        $post = Post::query()
                    ->with('tags:name,slug', 'topic:name,slug')
                    ->findOrFail($id);

        return view("admin.blog.create", [
            'post' => $post,
            'tags' => Tag::query()->get(['name', 'slug']),
            'topics' => Topic::query()->get(['name', 'slug']),
        ]);
    }

    /**
     * Display stats for the specified resource.
     *
     * @param  string  $id
     * 
     */
    public function stats(string $id)
    {
        $post = Post::query()
                    ->published()
                    ->findOrFail($id);

        $stats = new StatsAggregator(request()->user());

        $results = $stats->getStatsForPost($post);

        return response()->json($results);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     *
     * @throws Exception
     */
    public function destroy($id)
    {
        $post = Post::query()
                    ->findOrFail($id);

        $post->delete();

        return back()->with('success', 'Action Successfully');
    }
}
