<?php

namespace NovaAdvancedUI;

use Eduka\Abstracts\Classes\EdukaServiceProvider;
use Illuminate\Support\Facades\Blade;

class NovaAdvancedUIServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        $this->customViewNamespace(__DIR__.'/../resources/views', 'course');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->registerCommands();

        parent::boot();
    }

    public function register()
    {
        parent::register();
    }

    protected function registerCommands()
    {
        $this->commands([
        ]);
    }

    protected function registerBladeComponents()
    {
        Blade::componentNamespace('NovaAdvancedUI\\Views\\Components', 'masteringnova');
    }
}
