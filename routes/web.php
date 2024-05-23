<?php
use App\Models\Newsletter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;


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






Route::get('/newsletters', [NewsletterController::class, 'index']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();



Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function () {
    // Add other routes that require authentication here
    Route::get('calendar', function () {
        return view('calendar');
    });
    
    Route::get('forms', function () {
        return view('forms');
    });

    Route::get('blank', function () {
        return view('blank');
    });

    Route::get('tables', function () {
        return view('tables');
    });

    Route::get('tabs', function () {
        return view('tabs');
    });

});