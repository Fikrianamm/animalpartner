<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\ConsultationController;
use App\Models\Articles;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumPostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',[
        'articles' => Articles::latest()->take(4)->get(),
    ]);
});

Route::resource('/artikel', ArticlesController::class);

Route::resource('/forum', ForumPostsController::class);

Route::resource('/konsultasi', ConsultationController::class);

Route::resource('/animal', AnimalsController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/forum/create', [ForumPostsController::class, 'create']);
});

require __DIR__.'/auth.php';
