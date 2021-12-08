<?php

namespace InetStudio\BannersPackage\Groups\Providers;

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
                'InetStudio\BannersPackage\Groups\Console\Commands\SetupCommand',
            ]
        );
    }

    protected function registerPublishes(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        if (Schema::hasTable('banners_groups')) {
            return;
        }

        $timestamp = date('Y_m_d_His', time());
        $this->publishes(
            [
                __DIR__.'/../../database/migrations/create_banners_groups_tables.php.stub' => database_path(
                    'migrations/'.$timestamp.'_create_banners_groups_tables.php'
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
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin.module.banners-package.groups');
    }

    protected function registerFormComponents()
    {
        FormBuilder::component(
            'banners_groups',
            'admin.module.banners-package.groups::back.forms.fields.groups',
            ['name' => null, 'value' => null, 'attributes' => null]
        );
    }
}
