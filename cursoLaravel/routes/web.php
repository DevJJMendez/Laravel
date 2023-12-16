<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing.index')->name('index');
Route::view('/about', 'landing.about')->name('about');
