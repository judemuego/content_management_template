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
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('backend.master.index');
        
    });

    Route::get('/', function () {
        return view('backend.pages.dashboard');
    });

    Route::group(['prefix' => '/inventory'], function (){

        Route::group(['prefix' => '/customer'], function (){
            Route::get          ('/',                            'CustomerController@index'                                  )->name('customer');
            Route::get          ('/get',                         'CustomerController@get'                                    )->name('get_customer');
            Route::post         ('/save',                        'CustomerController@store'                                  )->name('save_customer');
            Route::get          ('/edit/{id}',                   'CustomerController@edit'                                   )->name('edit_customer');
            Route::post         ('/update/{id}',                 'CustomerController@update'                                 )->name('update_customer');
            Route::get          ('/destroy/{id}',                'CustomerController@destroy'                                )->name('destroy_customer');
        });

        Route::group(['prefix' => '/color'], function (){
            Route::get          ('/',                            'ColorController@index'                                  )->name('color');
            Route::get          ('/get',                         'ColorController@get'                                    )->name('get_color');
            Route::post         ('/save',                        'ColorController@store'                                  )->name('save_color');
            Route::get          ('/edit/{id}',                   'ColorController@edit'                                   )->name('edit_color');
            Route::post         ('/update/{id}',                 'ColorController@update'                                 )->name('update_color');
            Route::get          ('/destroy/{id}',                'ColorController@destroy'                                )->name('destroy_color');
        });

        Route::group(['prefix' => '/bag'], function (){
            Route::get          ('/',                            'BagController@index'                                  )->name('bag');
            Route::get          ('/get',                         'BagController@get'                                    )->name('get_bag');
            Route::post         ('/save',                        'BagController@store'                                  )->name('save_bag');
            Route::get          ('/edit/{id}',                   'BagController@edit'                                   )->name('edit_bag');
            Route::post         ('/update/{id}',                 'BagController@update'                                 )->name('update_bag');
            Route::get          ('/destroy/{id}',                'BagController@destroy'                                )->name('destroy_bag');
        });
        

    });

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

