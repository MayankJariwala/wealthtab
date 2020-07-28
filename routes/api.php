<?php

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

use Illuminate\Support\Facades\Route;

Route::prefix("auth")->namespace("Api")->group(function () {
    Route::post("login", [
        "uses" => "UsersController@login",
        "as" => "login"
    ]);
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::get("files", [
        "uses" => "FileOpsController@fetchUserFiles",
        "as" => "user_files"
    ]);
    Route::get("file/{fileId}", [
        "uses" => "FileOpsController@fileById",
        "as" => "file_by_id"
    ]);
});
