<?php

namespace Valery\Core\Loaders;

use Illuminate\Support\Facades\File;
use Valery\Core\Foundation\Valery;

trait ConfigsLoaderTrait
{
    public function loadConfigsFromCore(): void
    {
        $shipConfigsDirectory = base_path(Valery::SHIP_CORE_PATH.'/Configs');
        $this->loadConfigs($shipConfigsDirectory);
    }

    private function loadConfigs($configFolder): void
    {
        if (File::isDirectory($configFolder)) {
            $files = File::files($configFolder);

            foreach ($files as $file) {
                $name = File::name($file);
                $path = $configFolder.'/'.$name.'.php';

                $this->mergeConfigFrom($path, $name);
            }
        }
    }

    public function loadConfigsFromModule($modulePath): void
    {
        $moduleConfigsDirectory = $modulePath.'/Configs';
        $this->loadConfigs($moduleConfigsDirectory);
    }
}
