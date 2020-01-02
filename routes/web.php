<?php

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
    return view('pages.dashboard');
});
Route::get('/customer', function () {
    return view('pages.customer_reg');
});
Route::get('/employee', function () {
    return view('pages.employee_reg');
});
Route::get('/sales', function () {
    return view('pages.sales');
});
Route::get('/tyre', function () {
    return view('pages.tyre_sale');
});
Route::get('/batteries', function () {
    return view('pages.battery_sale');
});
Route::get('/alloywheels', function () {
    return view('pages.alloywheel_sale');
});
Route::get('/payments', function () {
    return view('pages.payments');
});
Route::get('/stock', function () {
    return view('pages.stock');
});
Route::get('/tyrestock', function () {
    return view('pages.tyre_stock');
});
Route::get('/batteriesstock', function () {
    return view('pages.battery_stock');
});
Route::get('/alloywheelsstock', function () {
    return view('pages.alloywheel_stock');
});