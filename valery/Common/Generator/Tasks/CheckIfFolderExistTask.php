<?php

namespace Valery\Common\Generator\Tasks;

use Valery\Core\Abstracts\Tasks\AbstractTask;

class CheckIfFolderExistTask extends AbstractTask
{
    public function run(string $folderName): bool
    {
        if (file_exists($folderName)) {
            return true;
        }

        return false;
    }
}
