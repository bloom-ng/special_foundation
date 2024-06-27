<?php

use App\Models\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\BeneficiaryApplicationController;
use App\Http\Controllers\PartnerApplicationController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Auth;
use App\Models\Download;
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



Route::get('homepage', function () {
    return view('homepage');
});

Route::get('who-we-are', function () {
    $downloads = Download::all();
    return view('who-we-are')->with('downloads', $downloads);
});

Route::post('/newsletters', [NewsletterController::class, 'create']);




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::post('/beneficiaries', [BeneficiaryApplicationController::class, 'store']);
Route::post('/partners', [PartnerApplicationController::class, 'store']);
Route::post('/donation-lead', [DonationController::class, 'store']);


Auth::routes();

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Add other routes that require authentication here
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/newsletters', [NewsletterController::class, 'index']);
    Route::delete('/newsletters/{newsletter}', [NewsletterController::class, 'delete']);

    // Downloads routes
    Route::get('/downloads', [DownloadController::class, 'index']);
    Route::get('/downloads/create', [DownloadController::class, 'create']);
    Route::post('/downloads', [DownloadController::class, 'store']);
    Route::delete('/downloads/{download}', [DownloadController::class, 'destroy']);

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
    Route::get('/donation-lead', [DonationController::class, 'index']);
    Route::delete('/donation-lead/{donation}', [DonationController::class, 'destroy']);

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
    $posts = App\Models\Post::latest()->paginate();
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
    $similarPosts = [];
    if (!empty($post)) {
        $words = explode(' ', $post->title);
        $similarPosts = App\Models\Post::where(function ($query) use ($words) {
            foreach ($words as $word) {
                $query->orWhere('title', 'LIKE', "%{$word}%");
            }
        })->get()
        ->filter(function ($post, $key) use($id) {
            return $post->id != $id;
        });
    }

    return view('blog-view', [
        'post' => $post,
        'similar_posts' => $similarPosts
    ]);
});

Route::get('/get-involved', function () {
    $ambassadors = [
        ['name' => 'Abimbola Ayinde', 'list_image' => '/images/ambassador_1.png', 'image' => '/images/detail_1.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Akinbamidel Akintola', 'list_image' => '/images/ambassador_2.png', 'image' => '/images/detail_2.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Chukwuma Nwanze', 'list_image' => '/images/ambassador_3.png', 'image' => '/images/detail_3.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Damilola Akinwale', 'list_image' => '/images/ambassador_4.png', 'image' => '/images/detail_4.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Funlola Adegoke', 'list_image' => '/images/ambassador_5.png', 'image' => '/images/detail_5.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Ifeoma Okpala', 'list_image' => '/images/ambassador_6.png', 'image' => '/images/detail_6.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Ijeoma Anyigbo', 'list_image' => '/images/ambassador_7.png', 'image' => '/images/detail_7.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Nnenna Irebisi', 'list_image' => '/images/ambassador_8.png', 'image' => '/images/detail_8.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Oluwole Coker', 'list_image' => '/images/ambassador_9.png', 'image' => '/images/detail_9.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        ['name' => 'Seyi Akinwale', 'list_image' => '/images/ambassador_10.png', 'image' => '/images/detail_10.png', 'content' => 'Content for Ambassador 1', 'link' => 'https://linkedin.com/in/ambassador1'],
        // Add more ambassadors as needed
    ];

    return view('get-involved', compact('ambassadors'));
});

Route::get('/donate', function () {
    return view('donate');
});

Route::post('/donate', [DonationController::class, 'store']);