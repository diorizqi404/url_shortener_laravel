<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use PgSql\Lob;

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

// Route::get('/', function () {
//     return view('layouts.landing');
// });
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LinksController::class, 'index'])->name('dashboard');
    Route::post('/generate', [LinksController::class, 'store'])->name('generate-url');
    Route::put('/edit_url', [LinksController::class, 'update'])->name('edit-url');
    Route::delete('/delete_url', [LinksController::class, 'destroy'])->name('delete-url');
    Route::put('/change_password', [LinksController::class, 'changePassword'])->name('change-password');
});

Route::get('/{shortened_url}', [LinksController::class, 'shortenedUrl'])->name('shortened-url');