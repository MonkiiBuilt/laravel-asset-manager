<?php
/**
 * @author Jonathon Wallen
 * @date 5/6/17
 * @time 3:26 PM
 * @copyright 2008 - present, Monkii Digital Agency (http://monkii.com.au)
 */

Route::group(['prefix' => 'admin', 'namespace' => 'MonkiiBuilt\LaravelAssetManager', 'middleware' => ['laravel-administrator-menus', 'web']], function () {
    Route::get('/assets' , ['uses' => 'Controllers\AssetManagerController@index', 'as' => 'laravel-asset-manager']);
    Route::get('/assets/selector', ['uses' => 'Controllers\AssetManagerController@selector', 'as' => 'laravel-asset-manager-selector']);
    Route::get('/assets/editor', ['uses' => 'Controllers\AssetManagerController@editor', 'as' => 'laravel-asset-manager-editor']);
    Route::get('/assets/test', ['uses' => 'Controllers\AssetManagerController@test', 'as' => 'laravel-asset-manager-test']);
});