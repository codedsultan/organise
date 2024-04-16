<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            // $table->string('title');
            // $table->string('type');
            // $table->text('description');
            // $table->decimal('price');
            // $table->integer('max_admit')->default(1);
            // $table->integer('quantity_available')->nullable();
            // $table->integer('quantity_sold')->nullable();
            // $table->boolean('is_paused')->default(false);
            'event_id' => fake()->name(),
            'title' => fake()->title(),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(0,100),
            'type' => fake()->randomElement(['silver','gold','platinum']),
        ];
    }
}
