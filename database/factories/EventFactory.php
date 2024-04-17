<?php

namespace Database\Factories;

use App\Models\Organiser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'title' => fake()->sentence(),
            'bg_image_path' => 'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg',
            'description' => fake()->paragraph(),
            'start_date' => now()->toDate(),
            'end_date' => now()->addDays(14)->toDate(),
            'start_time' => now(),
            'end_time' => now()->addHours(5),
            'organiser_id' => Organiser::factory() ?? Organiser::inRandomOrder()->first()->id,
            'venue_name' => fake()->word(),
            'location' => fake()->city(),
            'location_address' => fake()->address()


        ];
    }
}
