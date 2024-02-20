<?php

use Valery\Common\Generator\Tasks\CheckIfFolderExistTask;
use Valery\Common\Generator\Tasks\CreateFolderTask;
use Valery\Common\Generator\Tasks\DeleteFolderTask;

it('test the deletion of folder using the task', closure: function () {
    $checkIfFolderExistTask = new CheckIfFolderExistTask();
    $createFolderTask = new CreateFolderTask();
    $deleteFolderTask = new DeleteFolderTask();

    $folderName = __DIR__.DIRECTORY_SEPARATOR.'Fake_Folder';

    $result = $checkIfFolderExistTask->run($folderName);
    expect($result)->toBeFalse();

    $createFolderTask->run($folderName);
    expect($folderName)->toBeDirectory();

    $result = $checkIfFolderExistTask->run($folderName);
    expect($result)->toBeTrue();

    $deleteFolderTask->run($folderName);

    $result = $checkIfFolderExistTask->run($folderName);
    expect($result)->toBeFalse();

});
