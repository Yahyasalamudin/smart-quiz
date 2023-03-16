<?php

use App\Http\Controllers\Auth\LoginController;
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

    // Quiz
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');

    // Profile
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
    Route::put('/editprofile/{id}', [ProfileController::class, 'update'])->name('editProfile');

    // Quiz
    Route::post('/add-quiz', [QuizController::class, 'store'])->name('quiz.store');
});
