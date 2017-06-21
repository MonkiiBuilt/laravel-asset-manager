<?php
/**
 * @author Jonathon Wallen
 * @date 5/6/17
 * @time 3:27 PM
 * @copyright 2008 - present, Monkii Digital Agency (http://monkii.com.au)
 */

namespace MonkiiBuilt\LaravelAssetManager;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;


class ServiceProvider extends BaseServiceProvider
{
    protected $defer = false;

    public function boot(\MonkiiBuilt\LaravelAdministrator\PackageRegistry $packageRegistry)
    {
        $packageRegistry->registerPackage('MonkiiBuilt\LaravelAssetManager');

        $this->loadMigrationsFrom(__DIR__.'/../resources/database/migrations');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-asset-manager');

        $this->publishes([
            __DIR__. '/../config/laravel-asset-manager.php' => config_path('/laravel-administrator/laravel-asset-manager.php')
        ], 'asset-manager-config');
    }
}