<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendor = Vendor::factory()->create([
            'name' => 'Segun',
            'email' => 'segun@gmail.com',
        ]);

        Booking::factory()->create([
            'vendor_id' => $vendor->id,
            // 'status' => 'approved'
        ]);

        Booking::factory()->create([
            'vendor_id' => $vendor->id,
            'status' => 'approved'
        ]);

        Booking::factory()->create([
            'vendor_id' => $vendor->id,
            'status' => 'invoice'
        ]);
    }
}
