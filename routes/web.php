<?php

use App\Models\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\BeneficiaryApplicationController;
use App\Http\Controllers\PartnerApplicationController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ProjectScheduleController;
use Illuminate\Support\Facades\Auth;
use App\Models\Download;
use App\Models\Volunteer;
use App\Models\View;
use App\Models\Gallery;
use App\Models\CMS;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index']);


Route::get('homepage', function () {
    return view('homepage');
});

Route::get('who-we-are', function () {
    $downloads = Download::all();
    $teams = CMS::getTeams();
    $boards = CMS::getBoards();
    return view('who-we-are', compact('teams'))->with('boards', $boards)->with('downloads', $downloads);
});

Route::post('/newsletters', [NewsletterController::class, 'create']);




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::post('/beneficiaries', [BeneficiaryApplicationController::class, 'store']);
Route::post('/partners', [PartnerApplicationController::class, 'store']);
Route::post('/donation-lead', [DonationController::class, 'store']);
Route::post('/volunteer', [VolunteerController::class, 'store']);


Auth::routes();

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Add other routes that require authentication here

    Route::get('/download/{model}/csv', [CSVController::class, 'download'])->where('model', '[A-Za-z]+');

    Route::get('dashboard', [DashboardController::class, 'show']);

    Route::get('/newsletters', [NewsletterController::class, 'index']);
    Route::delete('/newsletters/{newsletter}', [NewsletterController::class, 'delete']);

    // Downloads routes
    Route::get('/downloads', [DownloadController::class, 'index']);
    Route::get('/downloads/create', [DownloadController::class, 'create']);
    Route::post('/downloads', [DownloadController::class, 'store']);
    Route::delete('/downloads/{download}', [DownloadController::class, 'destroy']);

    // Project Schedules routes
    Route::get('/project-schedules', [ProjectScheduleController::class, 'index']);
    Route::get('/project-schedules/create', [ProjectScheduleController::class, 'create']);
    Route::post('/project-schedules', [ProjectScheduleController::class, 'store']);
    Route::put('/project-schedules/{project}', [ProjectScheduleController::class, 'update']);
    Route::get('/project-schedules/{project}/edit', [ProjectScheduleController::class, 'edit']);
    Route::delete('/project-schedules/{project}', [ProjectScheduleController::class, 'destroy']);

    // Beneficiary Applications routes
    Route::get('/beneficiaries', [BeneficiaryApplicationController::class, 'index']);
    Route::get('/beneficiaries/{id}', [BeneficiaryApplicationController::class, 'show']);
    Route::get('/beneficiaries/create', [BeneficiaryApplicationController::class, 'create']);
    Route::delete('/beneficiaries/{id}', [BeneficiaryApplicationController::class, 'destroy']);

    // Partner Applications routes
    Route::get('/partners', [PartnerApplicationController::class, 'index']);
    Route::get('/partners/{id}', [PartnerApplicationController::class, 'show']);
    Route::get('/partners/create', [PartnerApplicationController::class, 'create']);
    Route::delete('/partners/{id}', [PartnerApplicationController::class, 'destroy']);

    // Donation Lead routes
    Route::get('/donation-leads', [DonationController::class, 'index']);
    Route::get('/donation-leads/{id}', [DonationController::class, 'show']);
    Route::delete('/donation-leads/{donation}', [DonationController::class, 'destroy']);

     // Volunteer Applications routes
     Route::get('/volunteers', [VolunteerController::class, 'index']);
     Route::get('/volunteers/{id}', [VolunteerController::class, 'show']);
     Route::get('/volunteers/create', [VolunteerController::class, 'create']);
     Route::delete('/volunteers/{id}', [VolunteerController::class, 'destroy']);

     // Blog routes
     Route::get('/blogs', [PostController::class, 'index']);
     Route::get('/blogs/create', [PostController::class, 'create']);
     Route::get('/blogs/{id}', [PostController::class, 'show']);
     Route::post('/blogs/{id}', [PostController::class, 'store']);
     Route::delete('/blogs/{id}', [PostController::class, 'destroy']);

     // User routes
     Route::get('/users', [UserController::class, 'index']);
     Route::get('/users/create', [UserController::class, 'create']);
     Route::get('/users/{id}/edit', [UserController::class, 'edit']);
     Route::get('/users/{id}', [UserController::class, 'show']);
     Route::put('/users/{id}', [UserController::class, 'update']);
     Route::post('/users', [UserController::class, 'store']);
     Route::delete('/users/{id}', [UserController::class, 'destroy']);
     
     Route::get('/users/edit/me', [UserController::class, 'me']);

     // Gallery routes
    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::get('/galleries/create', [GalleryController::class, 'create']);
    Route::get('/galleries/{gallery}/edit', [GalleryController::class, 'edit']);
    Route::post('/galleries', [GalleryController::class, 'store']);
    Route::put('/galleries/{gallery}', [GalleryController::class, 'update']);
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy']);

});

Route::get('/project', [ProjectScheduleController::class, 'projects']);

Route::post('/upload-images', [PostCOntroller::class, 'upload'])->name('upload-img')->middleware('auth');


Route::get('/social-media-posts', function () {
    return view('social-media-posts');
});

Route::get('/forms', function () {
    return view('forms');
});

Route::get('/inspire-program', function () {
    return view('programme.inspire');
});
Route::get('/special-scholarship-program', function () {
    return view('programme.special');
});
Route::get('/mentorship-program', function () {
    return view('programme.mentorship');
});
Route::get('/summer-school-program', function () {
    return view('programme.summer');
});
Route::get('/life-long-program', function () {
    return view('programme.lifelong');
});
Route::get('/school-build', function () {
    return view('programme.school-builds');
});

Route::get('/blogs', function () {
    $posts = App\Models\Post::published()->latest('published_at')->paginate(); // Order by published_at descending
    $featured_posts = App\Models\Post::where('is_featured', 1)
                                ->get();

    return view('blogs', [
        'posts' => $posts,
        'featured_posts' => $featured_posts->shuffle()->take(4)
    ]
    );
});

Route::get('/blog/{id}', function ($id) {
    $post = App\Models\Post::with(['user'])->find($id);
    if (empty($post)) {
       $post = App\Models\Post::with(['user'])->where('slug', $id)->first();
    }
    $similarPosts = [];
    if (!empty($post)) {
        $words = explode(' ', $post->title);
        $similarPosts = App\Models\Post::where(function ($query) use ($words) {
            foreach ($words as $word) {
                $query->orWhere('title', 'LIKE', "%{$word}%");
            }
        })->take(3)->get()
        ->filter(function ($post, $key) use($id) {
            return $post->id != $id;
        });
    }

    // increase view
    View::create(['post_id' => $post->id]);

    return view('blog-view', [
        'post' => $post,
        'similar_posts' => $similarPosts
    ]);
});

Route::get('/get-involved', function () {

    return view('get-involved')
                ->with("genderMapping", Volunteer::getGenderMapping())
                ->with("sourceMapping", Volunteer::getSourceMapping())
                ->with("availabilityMapping", Volunteer::getAvailabilityMapping())
                ->with("interestMapping", Volunteer::getInterestMapping());
});

Route::get('/donate', function () {
    return view('donate');
});

Route::get('/gallery', function () {
    $galleries = Gallery::latest()->paginate();
    return view('gallery', compact('galleries'));
});



Route::post('/donate', [DonationController::class, 'store']);

Route::get('/admin/project-schedule/projects', [ProjectScheduleController::class, 'getCurrentAndNextYearProjects'])
    ->name('admin.project-schedule.projects');