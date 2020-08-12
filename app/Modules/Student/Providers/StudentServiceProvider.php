<?php

namespace App\Modules\Student\Providers;

use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Student\Repositories\StudentPaymentInterface;
use App\Modules\Student\Repositories\StudentPaymentRepository;
use App\Modules\Student\Repositories\StudentPaymentInstallmentInterface;
use App\Modules\Student\Repositories\StudentPaymentInstallmentRepository;
use App\Modules\Student\Repositories\StudentReadinessInterface;
use App\Modules\Student\Repositories\StudentReadinessRepository;
use App\Modules\Student\Repositories\StudentMockupInterface;
use App\Modules\Student\Repositories\StudentMockupRepository;
use App\Modules\Student\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
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
        $this->studentRegister();
        $this->studentPaymentRegister();
        $this->studentReadinessRegister();
        $this->studentMockupRegister();
        $this->studentPaymentInstallmentRegister();
    }

    public function studentRegister()
    {
        $this->app->bind(
            StudentInterface::class,
            StudentRepository::class
        );
    }

    public function studentReadinessRegister()
    {
        $this->app->bind(
            StudentReadinessInterface::class,
            StudentReadinessRepository::class
        );
    }

    public function studentMockupRegister()
    {
        $this->app->bind(
            StudentMockupInterface::class,
            StudentMockupRepository::class
        );
    }

    public function studentPaymentRegister()
    {
        $this->app->bind(
            StudentPaymentInterface::class,
            StudentPaymentRepository::class
        );
    }

    public function studentPaymentInstallmentRegister()
    {
        $this->app->bind(
            StudentPaymentInstallmentInterface::class,
            StudentPaymentInstallmentRepository::class
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
            __DIR__ . '/../Config/config.php' => config_path('student.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'student'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/student');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath,
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/student';
        }, \Config::get('view.paths')), [$sourcePath]), 'student');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/student');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'student');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'student');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production')) {
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
