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
    'uses' => 'Auth\LoginController@handleProviderCallback',
    'as' => 'login.callback'
]);

Route::get('login', [
    'uses' => 'Auth\LoginController@showLoginForm',
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
        Route::get('delete/{id}', [
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
        
        Route::get('edit/{id}', [
            'uses' => 'UsersController@edit',
            'as' => 'users.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'UsersController@update',
            'as' => 'users.update'
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

        Route::get('edit/{id}', [
            'uses' => 'ActivityTypeController@edit',
            'as' => 'activityTypes.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'ActivityTypeController@update',
            'as' => 'activityTypes.update'
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
        
        Route::get('edit/{id}', [
            'uses' => 'CountryController@edit',
            'as' => 'countries.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'CountryController@update',
            'as' => 'countries.update'
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
        
        Route::get('edit/{id}', [
            'uses' => 'TechnologyController@edit',
            'as' => 'technologies.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'TechnologyController@update',
            'as' => 'technologies.update'
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
        
        Route::get('edit/{id}', [
            'uses' => 'SeController@edit',
            'as' => 'se.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'SeController@update',
            'as' => 'se.update'
        ]); 
    });
    
    Route::group(['prefix' => 'carriers'], function(){
        Route::get('/', [
            'uses' => 'CarrierController@index',
            'as' => 'carriers.index'
        ]);

        Route::get('create', [
            'uses' => 'CarrierController@create',
            'as' => 'carriers.create'
        ]);

        Route::post('store', [
            'uses' => 'CarrierController@store',
            'as' => 'carriers.store'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'CarrierController@delete',
            'as' => 'carriers.delete'
        ]);
        
        Route::get('edit/{id}', [
            'uses' => 'CarrierController@edit',
            'as' => 'carriers.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'CarrierController@update',
            'as' => 'carriers.update'
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
        
        Route::get('edit/{id}', [
            'uses' => 'ActivityController@edit',
            'as' => 'activities.edit'
        ]);  

        Route::post('update/{id}', [
            'uses' => 'ActivityController@update',
            'as' => 'activities.update'
        ]);     
        
        Route::get('destroy/{id}', [
            'uses' => 'ActivityController@destroy',
            'as' => 'activities.destroy'
        ]);     
        
        Route::get('show/{id}', [
            'uses' => 'ActivityController@show',
            'as' => 'activities.show'
        ]);
    });
});








