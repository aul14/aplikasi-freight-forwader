<?php

namespace Database\Seeders;

use App\Models\AddInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddInfo::insert([
            [
                'trx_type'  => 'SQ',
                'kb1'  => 'FUMIGASI',
                'kb2'  => 'INSURANCE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trx_type'  => 'AQ',
                'kb1'  => 'FUMIGASI',
                'kb2'  => 'INSURANCE',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
