<?php

namespace Valery\Core\Loaders;

use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;
use Valery\Core\Foundation\Facades\Valery;

trait CommandsLoaderTrait
{
    public function loadCommandsFromModule($modulePath): void
    {
        $moduleCommandsDirectory = $modulePath.'/UI/CLI/Commands';
        $this->loadTheConsoles($moduleCommandsDirectory);
    }

    public function loadCommandsFromCore(): void
    {
        $shipMigrationDirectory = base_path(\Valery\Core\Foundation\Valery::SHIP_CORE_PATH.'/Commands');
        $this->loadTheConsoles($shipMigrationDirectory);
    }

    private function loadTheConsoles(string $moduleCommandsDirectory): void
    {
        if (File::isDirectory($moduleCommandsDirectory)) {
            $files = File::allFiles($moduleCommandsDirectory);

            foreach ($files as $consoleFile) {
                // Do not load route files
                if (! $this->isRouteFile($consoleFile)) {
                    $consoleClass = Valery::getClassFullNameFromFile($consoleFile->getPathname());
                    // When user from the Main Service Provider, which extends Laravel
                    // service provider you get access to `$this->commands`
                    $this->commands([$consoleClass]);
                }
            }
        }
    }

    private function isRouteFile(SplFileInfo $consoleFile): bool
    {
        return $consoleFile->getFilename() === 'closures.php';
    }
}
