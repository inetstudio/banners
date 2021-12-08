<?php

namespace InetStudio\BannersPackage\Places\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->registerConsoleCommands();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerFormComponents();
    }

    protected function registerConsoleCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands(
            [
                'InetStudio\BannersPackage\Places\Console\Commands\SetupCommand',
            ]
        );
    }

    protected function registerPublishes(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        if (Schema::hasTable('banners_places')) {
            return;
        }

        $timestamp = date('Y_m_d_His', time());
        $this->publishes(
            [
                __DIR__.'/../../database/migrations/create_banners_places_tables.php.stub' => database_path(
                    'migrations/'.$timestamp.'_create_banners_places_tables.php'
                ),
            ], 'migrations'
        );
    }

    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin.module.banners-package.places');
    }

    protected function registerFormComponents()
    {
        FormBuilder::component(
            'banners_places',
            'admin.module.banners-package.places::back.forms.fields.places',
            ['name' => null, 'value' => null, 'attributes' => null]
        );
    }
}
