<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Tests;

use Arcanedev\LaravelNotes\Tests\Stubs\Models\User;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * Class     TestCase
 *
 * @package  Arcanedev\LaravelNotes\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Illuminate\Database\Eloquent\Factory */
    protected $factory;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->migrate();
        $this->withFactories(__DIR__.'/fixtures/factories');
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            \Arcanedev\LaravelNotes\LaravelNotesServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        // Laravel App Configs
        $app['config']->set('auth.model', User::class);

        // Laravel Messenger Configs
        $app['config']->set('notes.authors.model', User::class);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Migrate the tables.
     */
    protected function migrate(): void
    {
        $migrations = array_map('realpath', [
            __DIR__.'/../database/migrations',
            __DIR__.'/fixtures/migrations',
        ]);

        foreach ($migrations as $path) {
            $this->loadMigrationsFrom($path);
        }
    }
}
