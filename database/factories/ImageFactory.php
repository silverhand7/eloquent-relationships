<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageable = $this->imageable();

        return [
            'url' => fake()->imageUrl(360, 360, 'img-', true, fake()->word()),
            'imageable_id' => $imageable::all()->random()->id,
            'imageable_type' => $imageable
        ];
    }

    public function imageable()
    {
        return fake()->randomElement([
            Author::class,
            Book::class
        ]);
    }
}
