<?php

use App\Http\Controllers\Dashboard\QuotationController;
use App\Http\Controllers\website\ContactUsController;
use App\Http\Controllers\website\DeveloperController;
use App\Http\Controllers\website\KeyController;
use App\Http\Controllers\website\ServiceController;
use App\Http\Controllers\website\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/project', [ProjectController::class, 'index']);
Route::get('/service', [ServiceController::class, 'index']);
Route::get('/developer', [DeveloperController::class, 'index']);
Route::get('/contact_us', [ContactUsController::class, 'index']);
Route::get('/quotation', [QuotationController::class, 'index']);
Route::get('/key', [KeyController::class, 'index']);

Route::post('/contact_us', [ContactUsController::class, 'create']);
Route::post('/quotation', [QuotationController::class, 'create']);

