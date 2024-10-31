<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard', ['users' => User::select(['avatar', 'name', 'email', 'created_at'])->paginate(10)])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


/* Route::get('/about', function () {
    return inertia('About', [
        'user' => 'Pablo'
    ]); //O helper inertia corresponde ao mesmo que usar Inertia::render para renderizar as páginas Vue
})->name('about');
//Outra forma de definir uma rota para uma Page e passar parâmetros se utilizando do Inertia
Route::inertia('/contact', 'Contact', ['email' => 'pablonogueira1996@gmail.com'])->name('contact'); */
