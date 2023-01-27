<?php

namespace Database\Seeders;

use App\Models\CurrencyDetailSatu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencyD1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrencyDetailSatu::insert([
            [
                'currency_id' => 1,
                'date'      => date('2020-01-13'),
                'curr_rate' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_id' => 2,
                'date'      => date('2020-12-23'),
                'curr_rate' => 19092.49,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_id' => 3,
                'date'      => date('2022-12-23'),
                'curr_rate' => 17293.89,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'currency_id' => 4,
                'date'      => date('2020-12-23'),
                'curr_rate' => 14160,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
