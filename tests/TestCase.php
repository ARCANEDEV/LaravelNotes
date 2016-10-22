<?php namespace Arcanedev\LaravelNotes\Tests;

use Arcanedev\LaravelNotes\Tests\Stubs\Models\User;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Database\Eloquent\Factory as ModelFactory;

/**
 * Class     TestCase
 *
 * @package  Arcanedev\LaravelNotes\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class TestCase extends BaseTestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var  \Illuminate\Database\Eloquent\Factory */
    protected $factory;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->migrate();
        $this->loadFactories();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Laravel Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Arcanedev\LaravelNotes\LaravelNotesServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            //
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Laravel App Configs
        $app['config']->set('database.default', 'testing');
        $app['config']->set('auth.model', Stubs\Models\User::class);

        // Laravel Messenger Configs
        $app['config']->set('laravel-notes.database.connection', 'testing');
        $app['config']->set('laravel-notes.authors.model', Stubs\Models\User::class);
    }

    /**
     * Migrate the tables.
     */
    protected function migrate()
    {
        $this->artisan('migrate', [
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__.'/../database/migrations'),
        ]);

        $this->artisan('migrate', [
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__.'/fixtures/migrations'),
        ]);
    }

    /**
     * Load Model Factories.
     */
    private function loadFactories()
    {
        $this->factory = $this->app->make(ModelFactory::class);
        $this->factory->load(__DIR__.'/fixtures/factories');
    }
}
