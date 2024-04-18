<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
        ]);

        Customer::factory()->create([
            'name' => 'Segun',
            'email' => 'segun@gmail.com',
        ]);

        Customer::factory(10)->create();
    }
}
