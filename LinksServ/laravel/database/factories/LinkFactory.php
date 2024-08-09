<?php

namespace Database\Factories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2),
            'url' => $this->faker->url,
            'description' => $this->faker->paragraph,
        ];
    }
}
