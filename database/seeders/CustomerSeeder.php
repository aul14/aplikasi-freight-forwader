<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            [
                'code'  => 'T001',
                'name'  => 'TAINAN ENTERPRISE INDONESIA ,PT',
                'acc_code' => '1.02.01.01',
                'acc_desc' => 'PIUTANG USAHA PIHAK KETIGA',
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'U001',
                'name'  => 'UNION YASHINDO, PT',
                'acc_code' => '1.02.01.01',
                'acc_desc' => 'PIUTANG USAHA PIHAK KETIGA',
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'T002',
                'name'  => 'TOKAI ELECTRONICS INDONESIA, PT',
                'acc_code' => '1.02.01.01',
                'acc_desc' => 'PIUTANG USAHA PIHAK KETIGA',
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
