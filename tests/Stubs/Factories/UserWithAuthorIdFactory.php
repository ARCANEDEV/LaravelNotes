<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Tests\Stubs\Factories;

use Arcanedev\LaravelNotes\Tests\Stubs\Models\UserWithAuthorId;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class     UserWithAuthorIdFactory
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class UserWithAuthorIdFactory extends Factory
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserWithAuthorId::class;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'  => $this->faker->name,
            'email' => $this->faker->safeEmail,
        ];
    }
}
