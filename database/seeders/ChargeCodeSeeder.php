<?php

namespace Database\Seeders;

use App\Models\ChargeCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChargeCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ChargeCode::truncate();
        ChargeCode::insert([
            [
                'item_code'  => '1110',
                'item_description'  => 'SI - LCL FREIGHT',
                'sales_acc_code'  => '4.01.01.02',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '1003',
                'item_description'  => 'FCL-DO CHARGE',
                'sales_acc_code'  => '4.01.01.01',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 1,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '2009',
                'item_description'  => 'FCL-DEMMURAGE',
                'sales_acc_code'  => '4.01.06.03',
                'cost_acc_code'  => '1.06.02.02',
                'vat_code_id'   => 1,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '2019',
                'item_description'  => 'FCL - LIFT ON LIFT OFF / LOLO',
                'sales_acc_code'  => '4.01.06.02',
                'cost_acc_code'  => '1.06.02.02',
                'vat_code_id'   => 1,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '4012',
                'item_description'  => 'AI-TRUCKING',
                'sales_acc_code'  => '4.01.06.01',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '4001',
                'item_description'  => 'AI-FREIGHT COLLECT',
                'sales_acc_code'  => '4.01.06.01',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '4005',
                'item_description'  => 'AI-DOC CHARGE',
                'sales_acc_code'  => '',
                'cost_acc_code'  => '',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '4015',
                'item_description'  => 'AI-AIR PORT TRANSFER',
                'sales_acc_code'  => '4.01.02.01',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '1017',
                'item_description'  => 'SI - FCL OTHERS',
                'sales_acc_code'  => '4.01.06.01',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '1117',
                'item_description'  => 'SI - LCL OTHERS',
                'sales_acc_code'  => '4.01.06.01',
                'cost_acc_code'  => '1.06.02.01',
                'vat_code_id'   => 1,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '2027',
                'item_description'  => 'SE - FCL FUMIGASI',
                'sales_acc_code'  => '4.01.06.02',
                'cost_acc_code'  => '1.06.02.02',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
