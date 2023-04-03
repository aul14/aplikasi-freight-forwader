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
        DeliveryType::truncate();
        DeliveryType::insert([
            [
                'type'  => 'EXW',
                'description'  => 'EX WORKS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'FCA',
                'description'  => 'FREE CARRIER',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'FAS',
                'description'  => 'FREE ALONGSIDE SHIP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'FOB',
                'description'  => 'FREE ON BOARD',
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
                'type'  => 'CIF',
                'description'  => 'COST, INSURANCE & FREIGHT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'CPT',
                'description'  => 'COST PAID TO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'CIP',
                'description'  => 'CARRIER & INSURANCE PAID TO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'DPU',
                'description'  => 'DELIVERED AT PLACE UNLOADED',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'DPA',
                'description'  => 'DELIVERED AT PLACE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'  => 'DDP',
                'description'  => 'DELIVERED DUTY PAID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
