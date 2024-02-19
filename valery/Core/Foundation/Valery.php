<?php

namespace Valery\Core\Foundation;

use Illuminate\Support\Facades\File;

class Valery
{
    public const VERSION = '0.0.2';

    private const MODULES_DIRECTORY_NAME = 'valery';

    private const APPS_DIRECTORY_NAME = 'Apps';

    public const SHIP_CORE_PATH = self::MODULES_DIRECTORY_NAME.DIRECTORY_SEPARATOR.'Core';

    public function getAllModulesPaths(): array
    {
        $appsNames = $this->getAppsNames();

        $modulePaths = [];

        foreach ($appsNames as $name) {
            $appModulePaths = $this->getAppsModulePaths($name);
            foreach ($appModulePaths as $modulePath) {
                $modulePaths[] = $modulePath;
            }
        }

        $sectionNames = $this->getSectionNames();

        foreach ($sectionNames as $name) {
            $sectionModulePaths = $this->getSectionModulePaths($name);
            foreach ($sectionModulePaths as $modulePath) {
                $modulePaths[] = $modulePath;
            }
        }

        return $modulePaths;
    }

    public function getSectionNames(): array
    {
        $sectionNames = [];

        foreach ($this->getSectionPaths() as $sectionPath) {
            $sectionNames[] = basename($sectionPath);
        }

        return $this->excludeCoreAndApp($sectionNames);
    }

    public function getSectionPaths(): array
    {
        return File::directories(base_path(self::MODULES_DIRECTORY_NAME));
    }

    public function getSectionModulePaths($sectionName): array
    {
        return File::directories(base_path(self::MODULES_DIRECTORY_NAME.DIRECTORY_SEPARATOR.$sectionName));
    }

    private function excludeCoreAndApp(array $sectionNames): array
    {
        return array_diff($sectionNames, ['Core', 'Apps']);
    }

    public function getAppsNames(): array
    {
        $appsNames = [];

        foreach ($this->getAppsPaths() as $appPath) {
            $appsNames[] = basename($appPath);
        }

        return $appsNames;
    }

    private function getAppsPaths(): array
    {
        return File::directories(base_path($this->getAppBasePath()));
    }

    private function getAppsModulePaths(mixed $appName): array
    {
        return File::directories(
            base_path(
                $this->getAppBasePath().
                DIRECTORY_SEPARATOR.
                $appName)
        );

    }

    private function getAppBasePath(): string
    {
        return self::MODULES_DIRECTORY_NAME.DIRECTORY_SEPARATOR.self::APPS_DIRECTORY_NAME;
    }

    /**
     * Get the full name (name \ namespace) of a class from its file path
     * result example: (string) "I\Am\The\Namespace\Of\This\Class"
     */
    public function getClassFullNameFromFile(string $filePathName): string
    {
        return "{$this->getClassNamespaceFromFile($filePathName)}\\{$this->getClassNameFromFile($filePathName)}";
    }

    /**
     * Get the class namespace form file path using token
     */
    protected function getClassNamespaceFromFile(string $filePathName): ?string
    {
        $src = file_get_contents($filePathName);

        $tokens = token_get_all($src);
        $count = count($tokens);
        $i = 0;
        $namespace = '';
        $namespace_ok = false;
        while ($i < $count) {
            $token = $tokens[$i];
            if (is_array($token) && $token[0] === T_NAMESPACE) {
                // Found namespace declaration
                while (++$i < $count) {
                    if ($tokens[$i] === ';') {
                        $namespace_ok = true;
                        $namespace = trim($namespace);
                        break;
                    }
                    $namespace .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                }

                break;
            }
            $i++;
        }
        if (! $namespace_ok) {
            return null;
        }

        return $namespace;
    }

    /**
     * Get the class name from file path using token
     */
    protected function getClassNameFromFile(string $filePathName): mixed
    {
        $php_code = file_get_contents($filePathName);

        $classes = [];
        $tokens = token_get_all($php_code);
        $count = count($tokens);
        for ($i = 2; $i < $count; $i++) {
            if ($tokens[$i - 2][0] == T_CLASS
                && $tokens[$i - 1][0] == T_WHITESPACE
                && $tokens[$i][0] == T_STRING
            ) {
                $class_name = $tokens[$i][1];
                $classes[] = $class_name;
            }
        }

        return $classes[0];
    }
}
