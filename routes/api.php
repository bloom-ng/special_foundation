<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/chat', function (Request $request) {
    $url = env('OPENAI_API_URL');
    $apiKey = env('OPENAI_API_KEY');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apiKey,
    ])->post($url . "/v1/chat/completions", [
        'model' => $request->input('model', 'gpt-3.5-turbo'),
        'temperature' => $request->input('temperature', 0),
        'messages' => $request->input('messages', []),
    ]);

    return $response->body();
});