<?php

namespace Database\Seeders;

use App\Models\Organiser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Organiser::factory()->create([
        //     'name' => 'Segun',
        //     'email' => 'segun@gmail.com',
        // ]);

        Organiser::factory(10)->create();
    }
}
