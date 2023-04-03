<?php

namespace Database\Seeders;

use App\Models\SystemNumbering;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SystemNumberingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SystemNumbering::truncate();

        SystemNumbering::insert([
            [
                'module_id'    => 19,
                'cycle'         => 'Y',
                'job_type'      => NULL,
                'next_number'   => 1,
                'length_number'   => 2,
                'prefix'   => 'S,[YY],[MM]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id'    => 20,
                'cycle'         => 'Y',
                'job_type'      => NULL,
                'next_number'   => 1,
                'length_number'   => 2,
                'prefix'   => 'C,[YY],[MM]',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id'    => 31,
                'cycle'         => 'Y',
                'job_type'      => NULL,
                'next_number'   => 1,
                'length_number'   => 3,
                'prefix'   => 'QS-,[YY],-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id'    => 33,
                'cycle'         => 'Y',
                'job_type'      => NULL,
                'next_number'   => 1,
                'length_number'   => 3,
                'prefix'   => 'QA-,[YY],-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id'    => 34,
                'cycle'         => 'Y',
                'job_type'      => NULL,
                'next_number'   => 1,
                'length_number'   => 2,
                'prefix'   => 'WPCS,[YY],[MM],-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id'    => 35,
                'cycle'         => 'Y',
                'job_type'      => NULL,
                'next_number'   => 1,
                'length_number'   => 2,
                'prefix'   => 'WPCBKA,[YY],[MM],-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'module_id'    => 36,
                'cycle'         => 'Y',
                'job_type'      => 'FC,LC',
                'next_number'   => 1,
                'length_number'   => 2,
                'prefix'   => 'JKT-EXP/,[YY],/,[MM],/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
