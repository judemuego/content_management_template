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
    return view('backend.master.index');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
});


Route::group(['prefix' => '/admin/employeeprofile'], function (){
    Route::get          ('/',                            'TestimonialsController@index'                          )->name('selection');
    Route::post         ('/save',                        'TestimonialsController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'TestimonialsController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'TestimonialsController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'TestimonialsController@destroy'                        )->name('reason_update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
