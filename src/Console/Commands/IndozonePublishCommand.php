<?php
/*
 * This file is part of the IndoRegion package.
 * 
 * (c) Ully Kharisma Putra <kharizma | ullykharisma@gmail.com>
 *
 */

namespace Kharizma\Indozone\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class IndozonePublishCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'indozone:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Indozone files from vendor packages';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->publishMigrations();
        $this->publishModels();
        $this->publishSeeders();
        
        $this->info("Publishing Indozone complete");
    }

    /**
     * Publish migrations.
     *
     * @return void
     */
    protected function publishMigrations(): void
    {
        $sources = __DIR__.'/../../database/migrations';
        $filesInFolder = File::allFiles($sources);

        foreach ($filesInFolder as $path) {
            $file = pathinfo($path);

            File::copy($file['dirname'].'/'.$file['basename'],database_path('migrations').'/'.$file['basename']);

            $this->info("Copying file migrations: ".database_path('migrations').'/'.$file['basename']);
        }
    }

    /**
     * Publish model.
     *
     * @return void
     */
    protected function publishModels()
    {
        $targetPath = app_path()."/Models";

        if (!File::isDirectory($targetPath)){
            File::makeDirectory($targetPath, 0777, true, true);
        }

        $sources = __DIR__.'/../../database/models';
        $filesInFolder = File::allFiles($sources);

        foreach ($filesInFolder as $path) {
            $file = pathinfo($path);

            File::copy($file['dirname'].'/'.$file['basename'],$targetPath.'/'.$file['basename']);

            $this->info("Copying file models: ".$targetPath.'/'.$file['basename']);
        }
    }

    /**
     * Publish model.
     *
     * @return void
     */
    protected function publishSeeders()
    {
        $sources = __DIR__.'/../../database/seeders';
        $filesInFolder = File::allFiles($sources);

        foreach ($filesInFolder as $path) {
            $file = pathinfo($path);

            File::copy($file['dirname'].'/'.$file['basename'],database_path('seeders').'/'.$file['basename']);

            $this->info("Copying file seeders: ".database_path('seeders').'/'.$file['basename']);
        }
    }
}