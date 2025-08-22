<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;


// Asegúrate de que solo esta línea maneje la ruta raíz
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test']);
Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');


Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
