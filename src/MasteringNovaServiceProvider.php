<?php

namespace NovaAdvancedUI;

use Brunocfalcao\Cerebrus\Cerebrus;
use Eduka\Abstracts\Classes\EdukaServiceProvider;
use Eduka\Nereus\NereusServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;
use NovaAdvancedUI\Commands\ETLData;

class NovaAdvancedUIServiceProvider extends EdukaServiceProvider
{
    public function boot()
    {
        Vite::macro('image', fn (string $asset) => $this->asset("resources/images/{$asset}"));

        $this->customViewNamespace(__DIR__.'/../resources/views', 'course');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->registerDirectives();

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
            ETLData::class,
        ]);
    }

    protected function registerBladeComponents()
    {
        Blade::componentNamespace('NovaAdvancedUI\\Views\\Components', 'masteringnova');
    }

    private function registerDirectives()
    {
        Blade::if('subscribedToNewsletter', function () {
            $session = new Cerebrus;
            $course = $session->get(NereusServiceProvider::COURSE_SESSION_KEY);

            if (! $course) {
                return false;
            }

            return $session->get('subscribed_'.$course->id.'_newsletter');
        });
    }
}
