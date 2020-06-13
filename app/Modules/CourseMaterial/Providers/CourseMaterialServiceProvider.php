<?php

namespace App\Modules\CourseMaterial\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\CourseMaterial\Repositories\CourseMaterialInterface;
use App\Modules\CourseMaterial\Repositories\CourseMaterialRepository;

use App\Modules\CourseMaterial\Repositories\CourseMaterialDetailInterface;
use App\Modules\CourseMaterial\Repositories\CourseMaterialDetailRepository;

use App\Modules\CourseMaterial\Repositories\CourseMaterialPlanInterface;
use App\Modules\CourseMaterial\Repositories\CourseMaterialPlanRepository;

class CourseMaterialServiceProvider extends ServiceProvider
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
        $this->courseMaterialRegister();
        $this->courseMaterialdetailRegister();
        $this->courseMaterialplanRegister();
    }

    public function courseMaterialRegister(){
        $this->app->bind(
            CourseMaterialInterface::class,
            CourseMaterialRepository::class
        );
    }

    public function courseMaterialdetailRegister(){
        $this->app->bind(
            CourseMaterialDetailInterface::class,
            CourseMaterialDetailRepository::class
        );
    }

    public function courseMaterialplanRegister(){
        $this->app->bind(
            CourseMaterialPlanInterface::class,
            CourseMaterialPlanRepository::class
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
            __DIR__.'/../Config/config.php' => config_path('coursematerial.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'coursematerial'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/coursematerial');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/coursematerial';
        }, \Config::get('view.paths')), [$sourcePath]), 'coursematerial');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/coursematerial');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'coursematerial');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'coursematerial');
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
