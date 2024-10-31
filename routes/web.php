<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        return inertia('Dashboard', [
            'users' => User::when($request->search, function($query) use ($request) {
                $query
                ->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%');
            })->paginate(10)->withQueryString(),
            'searchTerm' => $request->search,
            'can' => [
                'delete_user' => Auth::user() ? Auth::user()->can('delete', User::class) : null,
            ]
        ]);
    })->name('dashboard');
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
