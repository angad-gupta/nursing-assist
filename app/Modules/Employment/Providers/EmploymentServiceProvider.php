<?php

namespace App\Modules\Employment\Providers;

use App\Modules\Employment\Repositories\OrgChartLogInterface;
use App\Modules\Employment\Repositories\OrgChartLogRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use App\Modules\Employment\Repositories\DepartmentInterface;
use App\Modules\Employment\Repositories\DepartmentRepository;

use App\Modules\Employment\Repositories\DesignationInterface;
use App\Modules\Employment\Repositories\DesignationRepository;

use App\Modules\Employment\Repositories\EmploymentInterface;
use App\Modules\Employment\Repositories\EmploymentRepository;

use App\Modules\Employment\Repositories\OffBoardingInterface;
use App\Modules\Employment\Repositories\OffBoardingRepository;

class EmploymentServiceProvider extends ServiceProvider
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
        $this->departmentRegister();
        $this->designationRegister();
        $this->employmentRegister();
        $this->orgRegister();
        $this->registerOffBoarding();
    }

    public function orgRegister(){

        $this->app->bind(
            OrgChartLogInterface::class,
            OrgChartLogRepository::class
        );

    }

    public function registerOffBoarding(){

        $this->app->bind(
            OffBoardingInterface::class,
            OffBoardingRepository::class
        );

    }

    public function departmentRegister(){
      
      $this->app->bind(
          DepartmentInterface::class,
          DepartmentRepository::class
      );
      
    } 
    
    public function designationRegister(){
    
      $this->app->bind(
          DesignationInterface::class,
          DesignationRepository::class
      );
        
    }
    
    public function employmentRegister(){
        
        $this->app->bind(
            EmploymentInterface::class,
            EmploymentRepository::class
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
            __DIR__.'/../Config/config.php' => config_path('employment.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'employment'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/employment');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/employment';
        }, \Config::get('view.paths')), [$sourcePath]), 'employment');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/employment');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'employment');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'employment');
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