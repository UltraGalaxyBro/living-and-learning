<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/about', function () {
    return inertia('About', [
        'user' => 'Pablo'
    ]); //O helper inertia corresponde ao mesmo que usar Inertia::render para renderizar as páginas Vue
});
//Outra forma de definir uma rota para uma Page e passar parâmetros se utilizando do Inertia
Route::inertia('/contact', 'Contact', ['email' => 'pablonogueira1996@gmail.com']);
