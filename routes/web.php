<?php

use Illuminate\Support\Facades\Route;

// Accueil
Route::get('/', function () {
    return view('FrontEnd.accueil');
})->name('accueil');

// Articles
Route::get('/articles', function () {
    return view('FrontEnd.articles');
})->name('articles');

// Contact
Route::get('/contact', function () {
    return view('FrontEnd.contact');
})->name('contact');
