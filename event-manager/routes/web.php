<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
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

// Rotas de autenticação (geradas pelo Laravel UI)
Auth::routes();

// Rota inicial (home)
Route::get('/', function () {
    return view('welcome');
});

// Rotas para o CRUD de eventos (apenas para administradores)
Route::middleware('admin')->group(function () {
    Route::resource('events', EventController::class);
});

// Rotas para participantes (exemplo)
Route::get('/events/available', [EventController::class, 'available'])->name('events.available');
Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');

// Rotas para inscrições
Route::middleware('auth')->group(function () {
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::post('/events/{event}/register', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::delete('/events/{event}/unregister', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
});