<?php

namespace App\Modules\ReminderNotify\Providers;

use App\Modules\ReminderNotify\Repositories\ReminderNotifyInterface;
use App\Modules\ReminderNotify\Repositories\ReminderNotifyRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ReminderNotifyServiceProvider extends ServiceProvider
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
        $this->reminderNotifyRegister();
    }

    public function reminderNotifyRegister()
    {
        $this->app->bind(
            ReminderNotifyInterface::class,
            ReminderNotifyRepository::class
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
            __DIR__.'/../Config/config.php' => config_path('remindernotify.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'remindernotify'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/remindernotify');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/remindernotify';
        }, \Config::get('view.paths')), [$sourcePath]), 'remindernotify');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/remindernotify');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'remindernotify');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'remindernotify');
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
