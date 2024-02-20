<?php

namespace Valery\Common\Generator\UI\CLI\Commands;

use Illuminate\Contracts\Console\PromptsForMissingInput;
use Valery\Common\Generator\Actions\CreateCommandAction;
use Valery\Core\Abstracts\Commands\AbstractConsoleCommand;

/**
 * Class CreateCommandCommand.
 *
 * @author Angel Jimenez Escobar <ajimenezescobar@gmail.com>
 */
class CreateCommandCommand extends AbstractConsoleCommand implements PromptsForMissingInput
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
