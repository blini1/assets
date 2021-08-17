<?php

use App\Http\Controllers\Api\v1\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(
    [
        "prefix" => 'v1',
        "middleware" => ["token_auth"],
    ],
    function () {
        Route::resources([
            'news' => NewsController::class,
        ]);
        // Bulk upload of the news articles through the XML file
        Route::post('news/bulk-upload', [NewsController::class, 'newsBulkUpload']);
    }
);
