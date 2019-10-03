<?php namespace Arcanedev\LaravelNotes\Tests;

use Arcanedev\LaravelNotes\LaravelNotesServiceProvider;

/**
 * Class     LaravelNotesServiceProviderTest
 *
 * @package  Arcanedev\LaravelNotes\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LaravelNotesServiceProviderTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \Arcanedev\LaravelNotes\LaravelNotesServiceProvider */
    protected $provider;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(LaravelNotesServiceProvider::class);
    }

    public function tearDown(): void
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\Providers\ServiceProvider::class,
            \Arcanedev\Support\Providers\PackageServiceProvider::class,
            LaravelNotesServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->provider);
        }
    }
}
