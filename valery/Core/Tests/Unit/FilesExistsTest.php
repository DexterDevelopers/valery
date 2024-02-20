<?php

const CORE_MODULE_DIRECTORY_NAME = 'valery/Core/';

it('test if Core files Exist', function (string $filename) {
    expect(CORE_MODULE_DIRECTORY_NAME . $filename)->toBeFile();
})->with([
    'Abstracts/Commands/AbstractConsoleCommand.php',
    'Abstracts/Providers/AbstractMainServiceProvider.php',
    'Commands/GetValeryVersionCommand.php',
    'Foundation/Facades/Valery.php',
    'Foundation/Valery.php',
    'Loaders/AliasesLoaderTrait.php',
    'Loaders/AutoLoaderTrait.php',
    'Loaders/CommandsLoaderTrait.php',
    'Loaders/ConfigsLoaderTrait.php',
    'Loaders/MigrationsLoaderTrait.php',
    'Loaders/ProvidersLoaderTrait.php',
    'Loaders/RoutesLoaderTrait.php',
    'Providers/CoreServiceProvider.php',
]);
