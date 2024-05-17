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

Route::resource('newsletters', NewsletterController::class);


Route::get('/create-newsletter', function () {
    $newsletter = Newsletter::all();


    return Newsletter::all();
});



Route::get('/', function () {
    return view('blank');
});

Route::get('calendar', function () {
    return view('calendar');
});

Route::get('forms', function () {
    return view('forms');
});

Route::get('index', function () {
    return view('index');
});

Route::get('tables', function () {
    return view('tables');
});

Route::get('tabs', function () {
    return view('tabs');
});
