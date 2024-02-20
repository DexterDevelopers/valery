<?php

namespace Valery\Common\Generator\Actions;

use Valery\Common\Generator\Tasks\CheckIfFolderExistTask;
use Valery\Common\Generator\Tasks\CreateFolderTask;
use Valery\Core\Abstracts\Actions\AbstractAction;

class CreateCommandAction extends AbstractAction
{
    public function __construct(
        private CheckIfFolderExistTask $checkIfFolderExistTask,
        private CreateFolderTask $createFolderTask,
        private CreateModuleAction $createModuleAction
    ) {
    }

    public function run()
    {

    }
}
