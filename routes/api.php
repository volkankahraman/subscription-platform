<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json(
        ['message' => "Welcome to the Subscription Platform"]
    );
});


Route::resource('websites.posts', PostController::class)->only('store');
Route::resource('websites.subscriptions', SubscriptionController::class)->only('store');
