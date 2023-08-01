<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ClientController;


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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('loans', ClientController::class);
    Route::get('/loans', [ClientController::class, 'index'])->name('loans');
    Route::get('/loans/search/{searchKey}', [ClientController::class, 'search'])->name('loans.search');
    Route::get('/loans/view/{client}', [ClientController::class, 'show'])->name('loans.show');
    Route::get('/loans/create', [ClientController::class, 'create'])->name('loans.create');
    Route::post('/loans', [ClientController::class, 'store'])->name('loans.store');


    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('/loans/toggle/{client}', [ClientController::class, 'toggleActive'])->name('loans.toggle');
        Route::delete('/loans/view/{client}', [ClientController::class, 'destroy'])->name('loans.delete');
        Route::get('/loans/edit/{client}', [ClientController::class, 'edit'])->name('loans.edit');
        Route::put('/loans/edit/{client}', [ClientController::class, 'update'])->name('loans.update');;
        Route::get('/loans/view/{client}/send-overdue-notice', [ClientController::class, 'send'])->name('loans.send');
    });
});
