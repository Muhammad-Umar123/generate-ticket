<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Models\Event;
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

Route::get('/', [DashboardController::class, 'home'])->name('home');


Route::middleware('guest')->group(function () {

    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');

});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('tickets', TicketController::class);
    Route::post('tickets/regenerate-link', [TicketController::class, 'regenerateLink'])->name('tickets.regenerateLink');
    Route::get('{ticket_link}', [TicketController::class, 'showTicketsByLink'])->name('tickets.showTicketsByLink');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


