<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/register-next', function () {
    return view('registerNext');
});
Route::get('/forgot-password', function () {
    return view('forgotPassword');
});
Route::get('/add-property', function () {
    return view('add-property');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact-us');
});

Route::get('/price', function () {
    return view('price');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/blogs', function () {
    return view('blog');
});
