<?php

use Valery\Common\Generator\Actions\CreateModuleAction;
use Valery\Common\Generator\Tasks\DeleteFolderTask;
use Valery\Core\Foundation\Valery;

it('test the creation of a module using action and its successfully', function () {
    $section = 'FAKE_SECTION';
    $name = 'FAKE_MODULE';

    $createModuleAction = app(CreateModuleAction::class);

    $result = $createModuleAction->run($section, $name);

    expect($result)->toBeTrue();
});

// TODO : Performance this test in the future
it('test the creation of a module using action and its error', function () {
    $section = 'FAKE_SECTION';
    $name = 'FAKE_MODULE';

    $createModuleAction = app(CreateModuleAction::class);

    $result = $createModuleAction->run($section, $name);

    expect($result)->toBeFalse();

    $section = ucwords(strtolower($section));
    $name = ucwords(strtolower($name));
    $path1 = base_path(Valery::MODULES_DIRECTORY_NAME.DIRECTORY_SEPARATOR.$section);
    $path2 = $path1.DIRECTORY_SEPARATOR.$name;

    $deleteFolderTask = new DeleteFolderTask();
    $deleteFolderTask->run($path2);
    $deleteFolderTask->run($path1);
});
