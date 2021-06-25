<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/vehicles', function () {
        return view('vehicles');
    })->name('vehicles');
    
    Route::get('/vehicles/{id}', function (Request $request) {
        return view('vehicles-history', ['id' => $request->id]);
    })->name('vehicles-history');
    
    Route::get('/clients', function () {
        return view('clients');
    })->name('clients');
    
    Route::get('/leads', function () {
        return view('leads');
    })->name('leads');

    Route::get('/providers', function () {
        return view('providers');
    })->name('providers');

    Route::get('/offers', function () {
        return view('offers');
    })->name('offers');

    Route::get('/offers/{id}', function (Request $request) {
        return view('offers-list', ['id' => $request->id]);
    })->name('offers-list');

    Route::get('/users', function () {
        return view('users');
    })->name('users');
});
