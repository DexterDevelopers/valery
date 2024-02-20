<?php

namespace Valery\Common\Generator\Actions;

use Valery\Common\Generator\Tasks\CheckIfFolderExistTask;
use Valery\Common\Generator\Tasks\CreateFolderTask;
use Valery\Core\Abstracts\Actions\AbstractAction;
use Valery\Core\Foundation\Valery;

class CreateModuleAction extends AbstractAction
{
    public function __construct(
        private CheckIfFolderExistTask $checkIfFolderExistTask,
        private CreateFolderTask $createFolderTask
    ) {
    }

    public function run(string $section, string $module): bool
    {
        //TODO pass method to helper and didn't replicate

        $section = ucwords(strtolower($section));
        $module = ucwords(strtolower($module));

        $path = base_path(Valery::MODULES_DIRECTORY_NAME.DIRECTORY_SEPARATOR.$section.DIRECTORY_SEPARATOR.$module);

        if (! $this->checkIfFolderExistTask->run($path)) {
            $this->createFolderTask->run($path);

            return true;
        }

        return false;
    }
}
