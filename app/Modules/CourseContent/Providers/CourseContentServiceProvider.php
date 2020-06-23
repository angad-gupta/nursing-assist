<?php

namespace App\Modules\CourseContent\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\CourseContent\Repositories\CourseContentInterface;
use App\Modules\CourseContent\Repositories\CourseContentRepository;

use App\Modules\CourseContent\Repositories\CoursePlanInterface;
use App\Modules\CourseContent\Repositories\CoursePlanRepository;

use App\Modules\CourseContent\Repositories\CourseSubTopicInterface;
use App\Modules\CourseContent\Repositories\CourseSubTopicRepository;

class CourseContentServiceProvider extends ServiceProvider
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
        $this->coursecontentRegister();
        $this->courseplanRegister();
        $this->coursesubtopicRegister();
    }

    public function coursecontentRegister(){
        $this->app->bind(
            CourseContentInterface::class,
            CourseContentRepository::class
        );
    }

    public function courseplanRegister(){
        $this->app->bind(
            CoursePlanInterface::class,
            CoursePlanRepository::class
        );
    }

    public function coursesubtopicRegister(){
        $this->app->bind(
            CourseSubTopicInterface::class,
            CourseSubTopicRepository::class
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
            __DIR__.'/../Config/config.php' => config_path('coursecontent.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'coursecontent'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/coursecontent');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/coursecontent';
        }, \Config::get('view.paths')), [$sourcePath]), 'coursecontent');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/coursecontent');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'coursecontent');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'coursecontent');
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
