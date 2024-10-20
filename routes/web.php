<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WrongQuestionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'show'])->name('home');

Route::get('/qr', [QrController::class, 'show'])->name('qr.show');
Route::get('/wrong-questions', [WrongQuestionsController::class, 'show'])->name('wrong-questions.show');

Route::get('/practice-exam', [TestController::class, 'create'])->name('practice-exam.create');
Route::get('/practice-exam/{hash}', [TestController::class, 'show'])->name('practice-exam.show');
Route::post('/practice-exam/{hash}', [TestController::class, 'store'])->name('practice-exam.store');
Route::get('/practice-exam/{hash}/result', [TestController::class, 'result'])->name('practice-exam.result');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
});

require __DIR__.'/auth.php';
