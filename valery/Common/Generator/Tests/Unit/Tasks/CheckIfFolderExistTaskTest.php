<?php

use Valery\Common\Generator\Tasks\CheckIfFolderExistTask;

it('test check if folder exist task test and is true', function () {
    $task = new CheckIfFolderExistTask();

    $result = $task->run(__DIR__);

    expect($result)->toBeTrue();
});

it('test check if folder exist task test and is false', function () {
    $task = new CheckIfFolderExistTask();

    $result = $task->run(__DIR__.DIRECTORY_SEPARATOR.'False_Folder');

    expect($result)->toBeFalse();
});
