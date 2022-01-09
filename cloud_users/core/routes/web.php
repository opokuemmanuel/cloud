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
    //  return view('admin.login');
      return view('Loginss');
  });

Route::get('show_register','registrationController@show_registration')->name('show_register');
Route::get('show_login','LogController@show_login')->name('show_login');

Route::post('/LogPage','LogController@Login')->name('LogPage');
Route::get('/materials','homepageController@show_materials')->name('view_materials');

Route::get('/download/{Course_Content}','filleController@download')->name('downloadfile');


Route::get('/announcetment','announcementController@announcemnts')->name('show_announcement');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
