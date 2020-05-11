<?php

namespace BladeComponents\Undraw\Providers;

use BladeComponents\Undraw\Components\UndrawComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class UndrawServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'undraw');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../resources/views' => resource_path('views/vendor/undraw'),
            ], 'views');
        }

        Blade::component(UndrawComponent::class, 'undraw');
    }
}
