<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SampleController;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::get('/student', [SampleController::class, 'student']);
Route::get('/student/{id}', [SampleController::class, 'getStudent']);

Route::post('/student/create', [SampleController::class, 'saveForm']);
Route::post('/student/edit', [SampleController::class, 'saveForm']);

Route::post('/student/delete', [SampleController::class, 'delete']);

Route::get('/{vue?}', [SampleController::class, 'index'])->where('vue', '[\/\w\.-]*');




require __DIR__.'/auth.php';
