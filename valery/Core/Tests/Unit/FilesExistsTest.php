<?php

const CORE_MODULE_DIRECTORY_NAME = 'valery/Core/';

it('test if Core files Exist', function (string $filename) {
    expect($filename)->toBeFile();
})->with([
    'valery/Core/Abstracts/Providers/AbstractMainServiceProvider.php',
    'valery/Core/Foundation/Facades/Valery.php',
    'valery/Core/Foundation/Valery.php',
    'valery/Core/Loaders/AliasesLoaderTrait.php',
    'valery/Core/Loaders/AutoLoaderTrait.php',
    'valery/Core/Loaders/MigrationsLoaderTrait.php',
    'valery/Core/Loaders/ProvidersLoaderTrait.php',
    'valery/Core/Providers/CoreServiceProvider.php',
]);
