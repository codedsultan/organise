<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            // $table->enum('status',['pending', 'approved', 'invoice'])->default('pending');
            'start_date' => now()->addDays(10),
            // $table->date('end_date')->nullable();
            'questions' => fake()->paragraph(),
            'vendor_id' => Vendor::factory() ?? Vendor::inRandomOrder()->first()->id,
            'items_required' => ['band','microphone','drinks'],
            'start_at' => now(),
            'end_at' => now()->addHours(5)
        ];
    }
}
