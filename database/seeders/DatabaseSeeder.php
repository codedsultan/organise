<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'segun@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'colby@workwithmarque.com',
        ]);

        $this->call([
            EventSeeder::class,
            CustomerSeeder::class,
            OrganiserSeeder::class,
            VendorSeeder::class,
            BookingSeeder::class

        ]);

    }
}
