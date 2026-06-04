<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');   
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/clients', function () {
    return view('pages.clients');
})->name('clients');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');