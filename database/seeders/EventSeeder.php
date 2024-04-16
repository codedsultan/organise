<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Organiser;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organiser = Organiser::factory()->create([
            'name' => 'Organiser User',
            'email' => 'organiser@example.com',
        ]);

        $event = Event::factory()->create([
            'organiser_id' => $organiser->id
        ]);

        $ticket1 = Ticket::factory()->create([
            'event_id' => $event->id,
            'type' => 'silver',
        ]);

        $ticket2 = Ticket::factory()->create([
            'event_id' => $event->id,
            'type' => 'gold',
        ]);

        $ticket3 = Ticket::factory()->create([
            'event_id' => $event->id ,
            'type' => 'platinum',
        ]);

        $organiser1 = Organiser::factory()->create([
            'name' => 'Segun',
            'email' => 'segun@gmail.com',
        ]);

        $event1 = Event::factory()->create([
            'organiser_id' => $organiser1->id
        ]);

        Ticket::factory()->create([
            'event_id' => $event1->id,
            'type' => 'silver',
        ]);

        Ticket::factory()->create([
            'event_id' => $event1->id,
            'type' => 'gold',
        ]);

        Ticket::factory()->create([
            'event_id' => $event1->id ,
            'type' => 'platinum',
        ]);

    }
}
