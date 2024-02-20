<?php

namespace Valery\Common\Generator\Generators;

use Illuminate\Filesystem\Filesystem;

class CommandGenerator
{
    public function __construct(private readonly Filesystem $filesystem)
    {
    }

    public function make(string $section, string $module, string $commandName): void
    {
        $template = $this->getTemplate();
    }

    private function getTemplate(): string
    {
        $templatePath = __DIR__.DIRECTORY_SEPARATOR.'../Stubs/ui/cli/command.stub';

        $template = $this->filesystem->get($templatePath);

        //        dd($template);

        return $template;
    }
}
