<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-action', [LoginController::class, 'actionLogin'])->name('actionLogin');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Halaman Dashboard
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    // Classroom
    Route::get('/class', [ClassController::class, 'index'])->name('class');
    Route::post('/class/add-class', [ClassController::class, 'store'])->name('class.store');

    // Quiz
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/create/{jumlahSoal}', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/quiz/add-quiz/{jumlahSoal}', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/quiz/{id}/addToClass', [QuizController::class, 'addClass'])->name('addClass');
    Route::get('/quiz/{id}/create', [QuizController::class, 'addToClass'])->name('addToClass');

    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
    Route::put('/editprofile/{id}', [ProfileController::class, 'update'])->name('editProfile');

});
