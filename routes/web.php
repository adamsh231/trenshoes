<?php

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

// -------------------- Client Side ----------------------//
Route::get('/', function () {
    return view('client.homepage');
});
Route::get('/catalogue', function () {
    return view('client.catalogue');
});
Route::get('/product/{id}', function () {
    return view('client.product');
});
// ------------------------------------------------------//

// -------------------- Admin Side ----------------------//
Route::get('/admin', function () {
    return view('admin.dashboard');
});
// ------------------------------------------------------//
