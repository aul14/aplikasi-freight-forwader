<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::insert([
            [
                'type'      => 'FI',
                'description'   => 'SEA FCL IMPORT',
                'module_code'   => 'SI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'LI',
                'description'   => 'SEA LCL IMPORT',
                'module_code'   => 'SI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'GI',
                'description'   => 'SEA CONCOL IMPORT',
                'module_code'   => 'SI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'AI',
                'description'   => 'AIR IMPORT',
                'module_code'   => 'AI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'FC',
                'description'   => 'SEA FCL EXPORT',
                'module_code'   => 'SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'LC',
                'description'   => 'SEA LCL EXPORT',
                'module_code'   => 'SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'GP',
                'description'   => 'SEA CONSOL EXPORT',
                'module_code'   => 'SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'AE',
                'description'   => 'AIR EXPORT',
                'module_code'   => 'SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'NJ',
                'description'   => 'NON JOB',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'MS',
                'description'   => 'MISC',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'W1',
                'description'   => 'DCT',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'W2',
                'description'   => 'DCS',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'W3',
                'description'   => 'DCC',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'W4',
                'description'   => 'DCC2',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'TP',
                'description'   => 'DOMESTIC LAND',
                'module_code'   => 'TP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'DA',
                'description'   => 'DOMESTIC AIR',
                'module_code'   => 'TP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
