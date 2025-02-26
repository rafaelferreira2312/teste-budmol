<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Models\Event;
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
    $events = Event::where('status', 'open')->get();
    return view('welcome', compact('events'));
});

// Rotas para o CRUD de eventos (apenas para administradores)
Route::middleware('admin')->group(function () {
    Route::resource('events', EventController::class);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Outras rotas de administrador
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

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [EventController::class, 'dashboard'])->name('admin.dashboard');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
