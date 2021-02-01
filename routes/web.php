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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/credimax', 'CredimaxController@index')->name('credimax');
Route::get('/checkout', 'CredimaxController@checkout')->name('checkout');

Route::prefix('/admin')
  ->namespace('Admin')
  ->name('admin.')
  ->group(function() {
    Route::match(['get', 'post'], '/', 'AdminController@login')->name('login');

    Route::middleware(['admin'])->group(function() {
      Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
      Route::get('logout', 'AdminController@logout')->name('logout');
      Route::get('settings', 'AdminController@settings')->name('settings');
      Route::post('check-current-password', 'AdminController@check_current_password')->name('check_current_password');
      Route::post('update-current-password', 'AdminController@update_password')->name('update_current_password');
      Route::get('update-admin-details', 'AdminController@update_admin_details')->name('view_update_admin_details');
      Route::post('update-admin-details', 'AdminController@update_admin_details')->name('update_admin_details');
    });

  });
