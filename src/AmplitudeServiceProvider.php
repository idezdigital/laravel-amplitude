<?php

namespace Idez\Amplitude;

use Illuminate\Support\ServiceProvider;

class AmplitudeServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(Amplitude::class, fn () => new Amplitude(config('services.amplitude.api_key')));
    }
}
