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

Route::group(['middleware' => []], function(){
    
    //Route::get('/home', array('uses' => 'HomeController@index'))->name('home');
    Route::post('employees/store', array('uses' => 'EmployeeController@store'))->name('employee.store');
    Route::get('employee', array('uses' => 'EmployeeController@create'))->name('employee.create');
    
    Route::post('customers/store', array('uses' => 'CustomerController@store'))->name('customer.store');
    Route::get('customer', array('uses' => 'CustomerController@create'))->name('customer.create');
});

Route::get('/', function () {
    return view('pages.dashboard');
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