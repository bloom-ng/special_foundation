<?php
use App\Models\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\BeneficiaryApplicationController;


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

Route::get('programs', function () {
        return view('programs');
    });

Route::get('who-we-are', function () {
        return view('who-we-are');
    });

Route::post('/newsletters', [NewsletterController::class, 'create']);




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();



Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Add other routes that require authentication here
    Route::get('dashboard', function () { return view('admin.dashboard');} );

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
    Route::post('/beneficiaries', [BeneficiaryApplicationController::class, 'store']);
    Route::delete('/beneficiaries/{id}', [BeneficiaryApplicationController::class, 'destroy']);

});
    
    
 Route::get('/forms', function () {
        return view('forms');
    });

