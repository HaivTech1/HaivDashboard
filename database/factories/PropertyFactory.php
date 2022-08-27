<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PropertyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title'                 => $title,
            'slug'                  => Str::slug($title . '-' . now()->getPreciseTimestamp(4)),
            'price'                 => $this->faker->numberBetween($min = 35000, $max = 100000),
            'built'                 => now(),
            'bedroom'               => rand(1, 5),
            'bathroom'              => rand(1, 5),
            'purpose'               => $this->faker->randomElement(['sale', 'rent']),
            'address'               =>  $this->faker->city(),
            'latitude'                   =>  $this->faker->latitude(-90, 90),
            'longitude'                   =>  $this->faker->longitude(-90, 90),
            'image'                 => null,
            'video'                 => null,
            'description'           =>  $this->faker->paragraph(5),
            'status'            => rand(0, 1),
            'property_category_id'  => $attribute['property_category_id'] ?? PropertyCategory::factory(),
            'author_id'               => $attribute['author_id'] ?? User::factory(),
        ];
    }
}