<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/counter', Counter::class);

Route::get('/client', function () {
    return view('client');
});
