<?php

namespace App\Modules\WhatOurStudentSay\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\WhatOurStudentSay\Repositories\WhatOurStudentSayInterface;
use App\Modules\WhatOurStudentSay\Repositories\WhatOurStudentSayRepository;


class WhatOurStudentSayServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->WhatOurStudentSayRegister();
    }

    public function WhatOurStudentSayRegister(){
        $this->app->bind(
            WhatOurStudentSayInterface::class,
            WhatOurStudentSayRepository::class
        );
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('whatourstudentsay.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'whatourstudentsay'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/whatourstudentsay');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/whatourstudentsay';
        }, \Config::get('view.paths')), [$sourcePath]), 'whatourstudentsay');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/whatourstudentsay');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'whatourstudentsay');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'whatourstudentsay');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
