<?php

it('test if Generator Stubs files Exist', function (string $filename) {
    expect('valery/Common/Generator/'.$filename)->toBeFile();
})->with([
    'Stubs/ui/cli/command.stub',
]);
