<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\license;
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
Route::prefix('v1')->group(function() {

    Route::get('/licenses', function(){
        $posts = license::orderBy('created_at', 'desc')->get();
        return  $posts;
    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

