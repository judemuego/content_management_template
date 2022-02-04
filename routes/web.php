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

    Route::get('/dashboard', function () {
        return view('backend.pages.dashboard');
    });

    Route::group(['prefix' => '/inventory'], function (){

        Route::group(['prefix' => 'item_type', 'middleware' => ['auth']], function (){
            Route::get          ('/',                            'ItemTypeController@index'                          )->name('selection');
            Route::post         ('/save',                        'ItemTypeController@store'                          )->name('reason');
            Route::get          ('/edit/{id}',                   'ItemTypeController@edit'                           )->name('reason');
            Route::post         ('/update/{id}',                 'ItemTypeController@update'                         )->name('reason_update');
            Route::get          ('/destroy/{id}',                'ItemTypeController@destroy'                        )->name('reason_update');
        });

        Route::group(['prefix' => '/color'], function (){
            Route::get          ('/',                            'ColorController@index'                                  )->name('color');
            Route::get          ('/get',                         'ColorController@get'                                    )->name('get_color');
            Route::post         ('/save',                        'ColorController@store'                                  )->name('save_color');
            Route::get          ('/edit/{id}',                   'ColorController@edit'                                   )->name('edit_color');
            Route::post         ('/update/{id}',                 'ColorController@update'                                 )->name('update_color');
            Route::get          ('/destroy/{id}',                'ColorController@destroy'                                )->name('destroy_color');
        });
        

    });

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

