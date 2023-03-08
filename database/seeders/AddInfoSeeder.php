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
        AddInfo::truncate();
        AddInfo::insert([
            [
                'trx_type'  => 'SQ',
                'kb1'  => 'FUMIGASI',
                'kb2'  => 'INSURANCE',
                'ks1'   => NULL,
                'kd1'   => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trx_type'  => 'AQ',
                'kb1'  => 'FUMIGASI',
                'kb2'  => 'INSURANCE',
                'ks1'   => NULL,
                'kd1'   => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trx_type'  => 'SEB',
                'kb1'  => NULL,
                'kb2'  => NULL,
                'ks1'   => 'SERIAL DOC NUMBER',
                'kd1'   => 'SEND DATE MANIFEST',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trx_type'  => 'AEB',
                'kb1'  => NULL,
                'kb2'  => NULL,
                'ks1'   => 'SERIAL DOC NUMBER',
                'kd1'   => 'SEND DATE MANIFEST',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
