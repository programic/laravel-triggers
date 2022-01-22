<?php

namespace Programic\Triggers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class TriggerServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        $this->setup();

        $this->commands([
            Commands\MakeTriggerCommand::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Trigger::class, fn () => new Trigger());
//            return new Trigger();
//        });

        $this->app->alias(Trigger::class, 'trigger');
    }

    private function setup()
    {
        //
    }
}
