<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// PROFILE ROUTES, testing
// Route::get('/profile', function () {
//     return Inertia::render('Profile');
// })->middleware(['auth', 'verified'])->name('profile');

Route::get('/profile', [CollectionController::class, 'index'])
                ->middleware(['auth', 'verified'])
                ->name('profile');

// Collection Routes
//----------------------------------------
        // Route::get('/create-collection', function () {
        //     return Inertia::render('CreateCollection');
        // })->middleware(['auth', 'verified'])->name('create.collection');

Route::get('/create-collection', [CollectionController::class, 'create'])
                ->middleware(['auth', 'verified'])
                ->name('create.collection');

Route::post('/create-collection', [CollectionController::class, 'store'])
                ->middleware(['auth', 'verified'])
                ->name('new.collection');

// CARD ROUTES
//---------------------------------------
Route::get('/create-card', [CardController::class, 'create'])
                ->middleware(['auth', 'verified'])
                ->name('create.card');

Route::post('/create-card', [CardController::class, 'store'])
                ->middleware(['auth', 'verified'])
                ->name('new.card');

require __DIR__.'/auth.php';
