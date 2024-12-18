<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class CreateVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:version  {newVersion} {oldVersion=v1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy controllers, requests, and resources to new version folder';

    /**
     * @var string[]
     */
    private $appDirectories = [
        'Http/Controllers',
        'Http/Resources',
        'Http/Requests',
        'Services',
    ];

    /**
     * @var string[]
     */
    private $rootDirectories = [
        'Modules/Api/app/Http/Controllers',
        'Modules/Api/routes',
    ];

    /**
     * @return int
     */
    public function handle()
    {
        $filesystem = new Filesystem();
        $newVersion = ucfirst($this->argument('newVersion'));
        $oldVersion = ucfirst($this->argument('oldVersion'));

        // copy directories under 'app' directory
        foreach ($this->appDirectories as $directory) {
            $source = app_path($directory . '/' . $oldVersion);
            $destination = app_path($directory . '/' . $newVersion);
            if (!$filesystem->exists($source)) {
                $this->error('Source directory does not exist : ' . $source);
                return 1;
            }

            try {
                $filesystem->mirror($source, $destination);
                $this->replaceNamespace($destination, $oldVersion, $newVersion);
                $this->info('Directory has been copied : ' . $destination);
            } catch (IOExceptionInterface $exception) {
                $this->error('An error occurred while creating your directory at ' . $exception->getPath());
                return 1;
            }
        }

        // copy directories under root directory
        foreach ($this->rootDirectories as $directory) {
            $source = base_path($directory . '/' . $oldVersion);
            $destination = base_path($directory . '/' . $newVersion);
            if (!$filesystem->exists($source)) {
                $this->error('Source directory does not exist : ' . $source);
                return 1;
            }

            try {
                $filesystem->mirror($source, $destination);
                $this->replaceNamespace($destination, $oldVersion, $newVersion);
                $this->info('Directory has been copied : ' . $destination);
            } catch (IOExceptionInterface $exception) {
                $this->error('An error occurred while creating your directory at ' . $exception->getPath());
                return 1;
            }
        }

        return 0;
    }

    /**
     * @param string $path
     * @param string $oldVersion
     * @param string $newVersion
     * @return void
     */
    private function replaceNamespace(string $path, string $oldVersion, string $newVersion)
    {
        $items = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($items as $item) {
            if ($item->isFile() && $item->getExtension() === 'php') {
                $fileContents = file_get_contents($item->getRealPath());
                $fileContents = str_replace($oldVersion, $newVersion, $fileContents);
                file_put_contents($item->getRealPath(), $fileContents);
            }
        }
    }
}
