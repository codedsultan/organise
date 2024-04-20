<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Organiser;
use App\Models\Ticket;
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

    //     $randomImages =[
    //         'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
    //         'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg'
    //    ];

        return [
            'title' => fake()->sentence(),
            // 'bg_image_path' => fake()->randomElement($randomImages),
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

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            // $event->uploadMediaFromUrl(
            //     $event->bg_image_path,
            //     'featured_image'
            // );
            Ticket::factory()->create([
                'event_id' => $event->id,
                'type' => 'silver',
            ]);

            Ticket::factory()->create([
                'event_id' => $event->id,
                'type' => 'gold',
            ]);

            Ticket::factory()->create([
                'event_id' => $event->id ,
                'type' => 'platinum',
            ]);


        });
    }
}
