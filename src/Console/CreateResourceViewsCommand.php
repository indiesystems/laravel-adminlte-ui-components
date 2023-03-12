<?php

namespace IndieSystems\AdminLteUiComponents\Console;

use Illuminate\Console\Command;
use PHPUnit\TextUI\XmlConfiguration\File;

class CreateResourceViewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminlte-view {resource}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a resource view templates using AdminLTE components.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $resourceName = $this->argument('resource');
        $views        = [
            'create' => 'create-page.blade.php',
            'edit'   => 'edit-page.blade.php',
            'index'  => 'index-page.blade.php',
            'show'   => 'show-page.blade.php',
        ];

        $targetDir = resource_path('views/'. $resourceName .'/');

        if(!file_exists($targetDir)){
            mkdir($targetDir,775, true);
        }

        foreach ($views as $name => $templateFile) {
            
            $sourceFile = sprintf('%s/%s',
                __DIR__ . '/../views/components/pages/templates',
                $templateFile,
            );

            $targetFile = resource_path('views/'. $resourceName .'/') . $name . '.blade.php';

            file_put_contents($targetFile, file_get_contents($sourceFile));
        }

        $this->info('Views added successfully.');
    }
}
