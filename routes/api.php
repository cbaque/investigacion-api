<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\ModeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ResearchArticleController;
use App\Http\Controllers\ResearchArticleAdvanceController;
use App\Http\Controllers\ResearchArticleClosingController;
use App\Http\Controllers\ResearchArticleUploadDocController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('auth', AuthController::class);

Route::post('auth', [AuthController::class, 'store']);

Route::group(['middleware' => ['auth:api'] ], function () {
    Route::delete('auth', [AuthController::class, 'destroy']);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('state', StateController::class);
    Route::resource('departament', DepartamentController::class);
    Route::resource('mode', ModeController::class);
    Route::resource('research', ResearchArticleController::class);
    Route::resource('research/advance', ResearchArticleAdvanceController::class);
    Route::resource('research/closing', ResearchArticleClosingController::class);
    Route::resource('research/upload', ResearchArticleUploadDocController::class);
});

