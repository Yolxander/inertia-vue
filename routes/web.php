<?php

use App\Http\Controllers\SearchController;
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
Route::get('/', [SearchController::class, "search"])->name('dashboard');
Route::delete('/{githubUser}', [SearchController::class, "destroy"]);
Route::delete('/', [SearchController::class, "destroy"]);

// Route::post('/search', [SearchController::class, "search"]);

// require __DIR__ . '/auth.php';
