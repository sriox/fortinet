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

Route::get('login/callback', [
    'uses' => 'Auth\RegisterController@handleProviderCallback',
    'as' => 'login.callback'
]);

Route::get('login', [
    'uses' => 'Auth\LoginController@googleLogin',
    'as' => 'login'
]);
Route::get('loginm', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'loginm'
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [
            'uses' => 'UsersController@index',
            'as' => 'users.index'
        ]);
        Route::get('delete', [
            'uses' => 'UsersController@delete',
            'as' => 'users.delete'
        ]);
        
        Route::get('create', [
            'uses' => 'UsersController@create',
            'as' => 'users.create'
        ]);
        Route::post('store', [
            'uses' => 'UsersController@store',
            'as' => 'users.store'
        ]);
        
    });
    

    Route::get('reports', function(){
        return view('reports.index');
    })->name('reports.index');
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'activityTypes'], function(){
        Route::get('/', [
            'uses' => 'ActivityTypeController@index',
            'as' => 'activityTypes.index'
        ]);

        Route::get('create', [
            'uses' => 'ActivityTypeController@create',
            'as' => 'activityTypes.create'
        ]);

        Route::post('store', [
            'uses' => 'ActivityTypeController@store',
            'as' => 'activityTypes.store'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'ActivityTypeController@delete',
            'as' => 'activityTypes.delete'
        ]);    
    });

    Route::group(['prefix' => 'countries'], function(){
        Route::get('/', [
            'uses' => 'CountryController@index',
            'as' => 'countries.index'
        ]);

        Route::get('create', [
            'uses' => 'CountryController@create',
            'as' => 'countries.create'
        ]);

        Route::post('store', [
            'uses' => 'CountryController@store',
            'as' => 'countries.store'
        ]);    

        Route::get('delete/{id}', [
            'uses' => 'CountryController@delete',
            'as' => 'countries.delete'
        ]);
    });

    Route::group(['prefix' => 'technologies'], function(){
        Route::get('/', [
            'uses' => 'TechnologyController@index',
            'as' => 'technologies.index'
        ]);

        Route::get('create', [
            'uses' => 'TechnologyController@create',
            'as' => 'technologies.create'
        ]);

        Route::post('store', [
            'uses' => 'TechnologyController@store',
            'as' => 'technologies.store'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'TechnologyController@delete',
            'as' => 'technologies.delete'
        ]);
    });

    Route::group(['prefix' => 'se'], function(){
        Route::get('/', [
            'uses' => 'SeController@index',
            'as' => 'se.index'
        ]);

        Route::get('create', [
            'uses' => 'SeController@create',
            'as' => 'se.create'
        ]);

        Route::post('store', [
            'uses' => 'SeController@store',
            'as' => 'se.store'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'SeController@delete',
            'as' => 'se.delete'
        ]);
    });

    Route::group(['prefix' => 'activities'], function(){
        Route::get('/', [
            'uses' => 'ActivityController@index',
            'as' => 'activities.index'
        ]);

        Route::get('all', [
            'uses' => 'ActivityController@all',
            'as' => 'activities.all'
        ]);

        Route::get('create', [
            'uses' => 'ActivityController@create',
            'as' => 'activities.create'
        ]);

        Route::post('store', [
            'uses' => 'ActivityController@store',
            'as' => 'activities.store'
        ]);    
    });
});








