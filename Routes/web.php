<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|-------------------------------------------------------------------------- */
Route::group(['prefix' => 'epanel', 'namespace' => 'Epanel', 'as' => 'epanel.'], function() {
    
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', 'IndexController@login')->name('login');
        Route::post('login', 'IndexController@authenticate');
        
        Route::post('cookie', 'IndexController@cookie')->name('cookie');
    });

    Route::group(['middleware' => ['auth', 'check.status']], function () {
        Route::get('/', 'IndexController@index')->name('index');
        Route::get('logout', 'IndexController@logout')->name('logout');
        
        Route::get('content', 'PageController@content')->name('content.index');
        Route::get('media', 'PageController@media')->name('media.index');
        Route::get('features', 'PageController@features')->name('features.index');
        Route::get('plugin', 'PageController@plugin')->name('plugin.index');
        Route::get('tools', 'PageController@tools')->name('tools.index');
        Route::get('pengguna', 'PageController@pengguna')->name('pengguna.index');
        Route::get('settings', 'PageController@settings')->name('settings.index');

        Route::prefix('media/explore')->group(function() {
            Route::get('/', 'ExploreController@index')->name('explore.index');
            Route::prefix('embed')->group(function() {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            });
        });
        
        Route::prefix('tools')->as('tools.')->group(function() {
            Route::get('clear-cache', 'ToolsController@clearCache')->name('clear-cache');
        });

        Route::prefix('settings')->as('settings.')->group(function() {
            Route::get('password', 'ProfileController@password')->name('password');
            Route::post('password', 'ProfileController@updatePassword');
            
            Route::get('profile', 'ProfileController@profile')->name('profile');
            Route::post('profile', 'ProfileController@updateProfile');

            Route::get('setting', 'ConfigController@setting')->name('setting');
            Route::post('setting', 'ConfigController@updateSetting');

            Route::get('check-update', 'UpdateController@check')->name('check-update');
            Route::get('update', 'UpdateController@update')->name('update');
        });
    });
});