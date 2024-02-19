<?php

namespace Valery\Core\UI\CLI\Commands;

use Illuminate\Console\Command;
use Valery\Core\Foundation\Facades\Valery;

class InstallApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'valery:install-app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command help to install app inside valery project. First populate all css and jss files and run installation for this app';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $appsNames = Valery::getAppsNames();

        $nameName = $this->choice(
            'Que app desea instalar',
            $appsNames
        );



    }
}
