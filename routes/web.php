<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('authlogin');
});
Route::get('/registerpharmacy', function () {
    return view('registerpharmacy');
});
Route::get('/showpharmacy', function () {
    return view('showpharmacy');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/profilepharmacy', function () {
    return view('profilepharmacy');
});
Route::get('/HomeOfPharmacy', function () {
    return view('HomeOfPharmacy');
});
Route::get('/showcompany', function () {
    return view('showcompany');
});
Route::get('/choose_your_role', function () {
    return view('Choose_your_role');
});
Route::get('/registerclient', function () {
    return view('registerclient');
});