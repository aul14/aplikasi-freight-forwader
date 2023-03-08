<?php

namespace Database\Seeders;

use App\Models\Salesman;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salesman::truncate();
        Salesman::insert([
            [
                'code'      => 'IMPORT',
                'name'   => 'IMPORT SALES TEAM',
                'email'     => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'EXPORT',
                'name'   => 'EXPORT SALES TEAM',
                'email'     => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'MGR/GM/DIR',
                'name'   => 'ANNIE SUTRISNO',
                'email'     => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SLS0001',
                'name'   => 'HOTMA ULI',
                'email'     => 'SALES@WPCLOGISTICS.COM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SLS0002',
                'name'   => 'HERLAMBANG',
                'email'     => 'SALES2@WPCLOGISTICS.COM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SLS0003',
                'name'   => 'DEWI SUDIBYO',
                'email'     => 'MARKETING@WPCLOGISTICS.COM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SLS0004',
                'name'   => 'JANUARY DAHLAN',
                'email'     => 'SALES1@WPCLOGISTICS.COM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SLS0005',
                'name'   => 'MARTHIN LAHEBA',
                'email'     => 'SALES3@WPCLOGISTICS.COM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
