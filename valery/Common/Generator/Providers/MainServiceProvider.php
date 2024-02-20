<?php

namespace Valery\Common\Generator\Providers;

use Valery\Core\Abstracts\Providers\AbstractMainServiceProvider;
use Valery\Core\Loaders\CommandsLoaderTrait;

class MainServiceProvider extends AbstractMainServiceProvider
{
    use CommandsLoaderTrait;

    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        parent::register();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
