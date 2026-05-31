<?php

use App\Http\Controllers\StudyLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudyLogController::class, 'index'])->name('study-logs.index');
Route::get('/study-logs/create', [StudyLogController::class, 'create'])->name('study-logs.create');
Route::post('/study-logs', [StudyLogController::class, 'store'])->name('study-logs.store');
