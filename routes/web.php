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
    
    Route::get('tyrestock', array('uses' => 'StockInTyreController@create'))->name('stockInTyre.create');
    Route::get('batteriesstock', array('uses' => 'StockInBatteryController@create'))->name('stockInBattery.create');
    Route::get('alloywheelsstock', array('uses' => 'StockInAlloyWheelController@create'))->name('stockInAlloyWheel.create');
    
    Route::post('stock-in-items/store', array('uses' => 'StockInController@store'))->name('stockIn.store');
    
    Route::get('tyre', array('uses' => 'SellTyreController@create'))->name('sellTyre.create');
    Route::get('batteries', array('uses' => 'SellBatteryController@create'))->name('sellBattery.create');
    Route::get('alloywheels', array('uses' => 'SellAlloyWheelController@create'))->name('sellAlloyWheel.create');
    
    Route::post('sells/store', array('uses' => 'SellController@store'))->name('sell.store');
    
    Route::get('payments', array('uses' => 'CreditSellController@create'))->name('creditSell.create');
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
Route::get('/stock', function () {
    return view('pages.stock');
});