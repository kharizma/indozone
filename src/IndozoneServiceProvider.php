<?php
/*
 * This file is part of the IndoRegion package.
 * 
 * (c) Ully Kharisma Putra <kharizma | ullykharisma@gmail.com>
 *
 */

namespace Kharizma\Indozone;

use Illuminate\Support\ServiceProvider;
use Kharizma\Indozone\Console\Commands\IndozonePublishCommand;

class IndozoneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                IndozonePublishCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
