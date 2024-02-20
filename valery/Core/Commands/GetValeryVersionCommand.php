<?php

namespace Valery\Core\Commands;

use Valery\Core\Abstracts\Commands\AbstractConsoleCommand;
use Valery\Core\Foundation\Valery;

class GetValeryVersionCommand extends AbstractConsoleCommand
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = "valery";

    /**
     * The console command description.
     */
    protected $description = "Display the current Valery version.";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info(Valery::VERSION);
    }
}