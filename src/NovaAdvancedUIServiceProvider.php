<?php

namespace NovaAdvancedUI;

use Brunocfalcao\Cerebrus\Cerebrus;
use Eduka\Abstracts\Classes\EdukaServiceProvider;
use Eduka\Nereus\NereusServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;

class NovaAdvancedUIServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));

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
