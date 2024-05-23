<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\DeveloperController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\KeyController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\ProjectImageController;
use App\Http\Controllers\Dashboard\QuotationController;
use App\Http\Controllers\Dashboard\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login' ,[AuthController::class , 'login']);

// Route::middleware("auth:sanctum")->group(function () {


    // home api
    Route::get('/home' , [HomeController::class , 'index']);
    Route::prefix('service')->group(function () {
        Route::get('/', [ServiceController::class, 'index']);
        Route::get('/{id}', [ServiceController::class, 'show']);
        Route::post('/', [ServiceController::class, 'create']);
        Route::post('/{id}', [ServiceController::class, 'update']);
        Route::delete('/{id}', [ServiceController::class, 'destroy']);
    });



    Route::prefix('developer')->group(function () {
        Route::get('/', [DeveloperController::class, 'index']);
        Route::get('/{id}', [DeveloperController::class, 'show']);
        Route::post('/', [DeveloperController::class, 'create']);
        Route::post('/{id}', [DeveloperController::class, 'update']);
        Route::delete('/{id}', [DeveloperController::class, 'destroy']);
    });

    Route::prefix('contact_us')->group(function () {
        Route::get('/', [ContactUsController::class, 'index']);
        Route::get('/{id}', [ContactUsController::class, 'show']);
        Route::post('/', [ContactUsController::class, 'create']);
        Route::post('/{id}', [ContactUsController::class, 'update']);
        Route::delete('/{id}', [ContactUsController::class, 'destroy']);
    });


    Route::prefix('key')->group(function () {
        Route::get('/', [KeyController::class, 'index']);
        Route::get('/{id}', [KeyController::class, 'show']);
        Route::post('/', [KeyController::class, 'create']);
        Route::post('/{id}', [KeyController::class, 'update']);
        Route::delete('/{id}', [KeyController::class, 'destroy']);
    });

    Route::prefix('quotation')->group(function () {
        Route::get('/', [QuotationController::class, 'index']);
        Route::get('/{id}', [QuotationController::class, 'show']);
        Route::post('/', [QuotationController::class, 'create']);
        Route::delete('/{id}', [QuotationController::class, 'destroy']);
    });

    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::get('/{id}', [ProjectController::class, 'show']);
        Route::post('/', [ProjectController::class, 'create']);
        Route::post('/{id}', [ProjectController::class, 'update']);
        Route::delete('/{id}', [ProjectController::class, 'destroy']);
    });
    Route::prefix('project_image')->group(function () {
        Route::get('/', [ProjectImageController::class, 'index']);
        Route::get('/{id}', [ProjectImageController::class, 'show']);
        Route::post('/', [ProjectImageController::class, 'create']);
        Route::post('/{id}', [ProjectImageController::class, 'update']);
        Route::delete('/{id}', [ProjectImageController::class, 'destroy']);
    });


// });
