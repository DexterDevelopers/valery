<?php

use Valery\Common\Generator\Tasks\CheckIfFolderExistTask;
use Valery\Common\Generator\Tasks\CreateFolderTask;

it('test the creation of folder using the task', function () {
    $checkIfFolderExistTask = new CheckIfFolderExistTask();
    $createFolderTask = new CreateFolderTask();

    $folderName = __DIR__.DIRECTORY_SEPARATOR.'False_Folder';

    $result = $checkIfFolderExistTask->run($folderName);
    expect($result)->toBeFalse();

    $createFolderTask->run($folderName);
    expect($folderName)->toBeDirectory();
    // Delete Folder
    rmdir($folderName);
});
