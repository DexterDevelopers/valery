<?php

namespace Valery\Core\Loaders;

use Valery\Core\Foundation\Facades\Valery;

trait AutoLoaderTrait
{
    use CommandsLoaderTrait;
    use ConfigsLoaderTrait;
    use MigrationsLoaderTrait;
    use ProvidersLoaderTrait;

    /**
     * To be used from the `boot` function of the main service provider
     */
    public function runLoadersBoot(): void
    {

        $this->loadMigrationsFromCore();
        $this->loadCommandsFromCore();

        // Iterate over all the containers folders and autoload most of the components
        foreach (Valery::getAllModulesPaths() as $modulePath) {
            $this->loadMigrationsFromModules($modulePath);
            $this->loadCommandsFromModule($modulePath);
        }
    }

    public function runLoaderRegister(): void
    {
        $this->loadConfigsFromCore();

        foreach (Valery::getAllModulesPaths() as $modulesPath) {
            $this->loadConfigsFromModule($modulesPath);
            $this->loadOnlyMainProvidersFromModules($modulesPath);
        }
    }
}
