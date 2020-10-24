<?php

declare(strict_types=1);

namespace Arcanedev\LaravelNotes\Tests\Stubs\Factories;

use Arcanedev\LaravelNotes\Tests\Stubs\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class     PostFactory
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PostFactory extends Factory
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
    protected $model = Post::class;

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
            'title'   => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(5, true),
        ];
    }
}
