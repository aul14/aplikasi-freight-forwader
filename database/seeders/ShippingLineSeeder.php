<?php

namespace Database\Seeders;

use App\Models\ShippingLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingLine::insert([
            [
                'code'  => 'TONGLLO',
                'name'  => 'TONAMI GLOBAL LOGISTICS CO.,LTD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'ARPENI',
                'name'  => 'ARPENI PRATAMA OCEAN LINE ,PT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'TRESMUDA',
                'name'  => 'TRESNA MUDA SEJATI',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
