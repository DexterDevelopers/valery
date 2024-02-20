<?php

namespace Valery\Common\Generator\Commands;

use Valery\Common\Generator\Actions\CreateCommandAction;
use Valery\Core\Abstracts\Commands\AbstractConsoleCommand;

class CreateCommandCommand extends AbstractConsoleCommand
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'valery:make:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just Create a new Command.';

    /**
     * Execute the console command.
     */
    public function handle(CreateCommandAction $action): void
    {
    }
}
