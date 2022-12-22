<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::insert([
            [
                'code'  => 'E0001',
                'name'  => 'EXPO FREIGHT BANGLADESH',
                'acc_code' => '2.01.01.01',
                'acc_desc' => 'UTANG USAHA PIHAK KETIGA',
                'currency_id'   => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'P0001',
                'name'  => 'PT MITRA ADITYA PARAMA',
                'acc_code' => '2.01.01.01',
                'acc_desc' => 'UTANG USAHA PIHAK KETIGA',
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'P0002',
                'name'  => 'PRIME FORKLIFT SERVICES. PT',
                'acc_code' => '2.01.01.01',
                'acc_desc' => 'UTANG USAHA PIHAK KETIGA',
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
