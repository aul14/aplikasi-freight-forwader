<?php

namespace Database\Seeders;

use App\Models\DeliveryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryType::insert([
            [
                'type'  => 'ATA',
                'description'  => 'AIRPORT TO AIRPORT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'ATD',
                'description'  => 'AIRPORT TO DOOR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'CFR',
                'description'  => 'COST & FREIGHT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'CIP',
                'description'  => 'CARRIAGE INSURANCE PAID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'DTA',
                'description'  => 'DOOR TO AIRPORT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'DTD',
                'description'  => 'DOOR TO DOOR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
