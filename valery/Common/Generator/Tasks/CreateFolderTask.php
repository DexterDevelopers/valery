<?php

namespace Valery\Common\Generator\Tasks;

use Valery\Core\Abstracts\Tasks\AbstractTask;

class CreateFolderTask extends AbstractTask
{
    /**
     * @return void
     */
    public function run($folderPath)
    {
        mkdir($folderPath, 0755, true);
    }
}
