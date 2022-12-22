<?php

namespace Database\Seeders;

use App\Models\Vessel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vessel::insert([
            [
                'code'  => 'CAPE FELTON',
                'name'  => 'CAPE FELTON',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'ONE FALCON',
                'name'  => 'ONE FALCON',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'CSCLURA',
                'name'  => 'CSCL URANUS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'WAN HAI 216',
                'name'  => 'WAN HAI 216',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'BOMAR RENAIS',
                'name'  => 'BOMAR RENAISSANCE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
