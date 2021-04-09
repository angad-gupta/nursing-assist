<?php

namespace App\Modules\Enrolment\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentRepository;

use App\Modules\Enrolment\Repositories\InvoiceLogInterface;
use App\Modules\Enrolment\Repositories\InvoiceLogRepository;

use App\Modules\Enrolment\Repositories\EnrolmentPaymentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentPaymentRepository;

class EnrolmentServiceProvider extends ServiceProvider
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
        $this->enrolmentRegister();
        $this->enrolmentpaymentRegister();
        $this->invoiceLogRegister();
    }

    public function enrolmentRegister(){
        $this->app->bind(
            EnrolmentInterface::class,
            EnrolmentRepository::class
        );
    }

    public function invoiceLogRegister(){
        $this->app->bind(
            InvoiceLogInterface::class,
            InvoiceLogRepository::class
        );
    }

     public function enrolmentpaymentRegister(){
        $this->app->bind(
            EnrolmentPaymentInterface::class,
            EnrolmentPaymentRepository::class
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
            __DIR__.'/../Config/config.php' => config_path('enrolment.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'enrolment'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/enrolment');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/enrolment';
        }, \Config::get('view.paths')), [$sourcePath]), 'enrolment');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/enrolment');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'enrolment');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'enrolment');
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
