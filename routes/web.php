<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;


// Asegúrate de que solo esta línea maneje la ruta raíz
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test']);
Route::get('faqs', [FaqController::class, 'index'])->name('faqs');
Route::get('/about', [AboutController::class, 'index'])->name('about');


Route::get('/services', [ServicesController::class, 'index'])->name('services');
