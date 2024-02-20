<?php

namespace Valery\Common\Generator\Tasks;

use Valery\Core\Abstracts\Tasks\AbstractTask;

class DeleteFolderTask extends AbstractTask
{
    public function run($folderPath): void
    {
        rmdir($folderPath);
    }
}
