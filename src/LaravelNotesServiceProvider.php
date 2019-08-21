<?php namespace Arcanedev\LaravelNotes;

use Arcanedev\Support\PackageServiceProvider;

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
    public function register()
    {
        parent::register();

        $this->registerConfig();
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        parent::boot();

        $this->publishConfig();
        LaravelNotes::$publishMigrations ? $this->publishMigrations() : $this->loadMigrations();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
