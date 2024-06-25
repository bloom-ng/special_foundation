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
