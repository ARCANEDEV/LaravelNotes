<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes;

use Arcanedev\Support\Providers\PackageServiceProvider;

/**
 * Class     LaravelNotesServiceProvider
 *
 * @package  Arcanedev\LaravelNotes
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LaravelNotesServiceProvider extends PackageServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'notes';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        parent::register();

        $this->registerConfig();
    }

    /**
     * Boot the service provider.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();

            LaravelNotes::$publishMigrations
                ? $this->publishMigrations()
                : $this->loadMigrations();
        }
    }
}
