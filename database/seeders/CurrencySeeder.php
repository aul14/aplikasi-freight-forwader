<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::insert([
            [
                'code'      => 'IDR',
                'description'   => 'INDONESIA RUPIAH',
                'variance_percent'   => 15.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'GBP',
                'description'   => 'UNITED KINGDOM POUNDS',
                'variance_percent'   => 20.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'EUR',
                'description'   => 'EURO',
                'variance_percent'   => 20.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'USD',
                'description'   => 'UNITED STATES DOLLARS',
                'variance_percent'   => 5.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
