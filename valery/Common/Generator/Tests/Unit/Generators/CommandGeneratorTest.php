<?php

use Valery\Common\Generator\Generators\CommandGenerator;

it('test command generator', function () {
    $commandGenerator = app(CommandGenerator::class);

    $commandGenerator->make('section', 'module', 'command_name');
});
