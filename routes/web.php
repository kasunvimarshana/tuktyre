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
    
    Route::post('tyrestock/store', array('uses' => 'StockInTyreController@store'))->name('stockInTyre.store');
    Route::get('tyrestock', array('uses' => 'StockInTyreController@create'))->name('stockInTyre.create');
    
    Route::post('batteriesstock/store', array('uses' => 'StockInBatteryController@store'))->name('stockInBattery.store');
    Route::get('batteriesstock', array('uses' => 'StockInBatteryController@create'))->name('stockInBattery.create');
    
    Route::post('alloywheelsstock/store', array('uses' => 'StockInAlloyWheelController@store'))->name('stockInAlloyWheel.store');
    Route::get('alloywheelsstock', array('uses' => 'StockInAlloyWheelController@create'))->name('stockInAlloyWheel.create');
    
    Route::post('tyre/store', array('uses' => 'SellTyreController@store'))->name('sellTyre.store');
    Route::get('tyre', array('uses' => 'SellTyreController@create'))->name('sellTyre.create');
    
    Route::post('batteries/store', array('uses' => 'SellBatteryController@store'))->name('sellBattery.store');
    Route::get('batteries', array('uses' => 'SellBatteryController@create'))->name('sellBattery.create');
    
    Route::post('alloywheels/store', array('uses' => 'SellAlloyWheelController@store'))->name('sellAlloyWheel.store');
    Route::get('alloywheels', array('uses' => 'SellAlloyWheelController@create'))->name('sellAlloyWheel.create');
});

Route::get('/signup', function () {
    return view('login');
});

Route::get('/', function () {
    return view('pages.dashboard');
});
Route::get('/sales', function () {
    return view('pages.sales');
});
Route::get('/payments', function () {
    return view('pages.payments');
});
Route::get('/stock', function () {
    return view('pages.stock');
});
Route::get('/batteriesstock', function () {
    return view('pages.battery_stock');
});
Route::get('/alloywheelsstock', function () {
    return view('pages.alloywheel_stock');
});