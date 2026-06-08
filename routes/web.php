<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudyLogController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [StudyLogController::class, 'index'])->name('study-logs.index');
    Route::get('/study-logs/create', [StudyLogController::class, 'create'])->name('study-logs.create');
    Route::post('/study-logs', [StudyLogController::class, 'store'])->name('study-logs.store');
    Route::get('/study-logs/{studyLog}', [StudyLogController::class, 'show'])->name('study-logs.show');
    Route::get('/study-logs/{studyLog}/edit', [StudyLogController::class, 'edit'])->name('study-logs.edit');
    Route::put('/study-logs/{studyLog}', [StudyLogController::class, 'update'])->name('study-logs.update');
    Route::delete('/study-logs/{studyLog}', [StudyLogController::class, 'destroy'])->name('study-logs.destroy');
});
