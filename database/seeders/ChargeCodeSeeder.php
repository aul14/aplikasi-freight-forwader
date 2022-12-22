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
        ChargeCode::insert([
            [
                'item_code'  => '1110',
                'item_description'  => 'SI - LCL FREIGHT',
                'sales_acc_code'  => '4.01.01.02',
                'sales_acc_desc'  => 'IMPORT SEA LCL',
                'cost_acc_code'  => '1.06.02.01',
                'cost_acc_desc'  => 'BDM IMPORT',
                'vat_code_id'   => 3,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '1003',
                'item_description'  => 'FCL-DO CHARGE',
                'sales_acc_code'  => '4.01.01.01',
                'sales_acc_desc'  => 'IMPORT SEA FCL',
                'cost_acc_code'  => '1.06.02.01',
                'cost_acc_desc'  => 'BDM IMPORT',
                'vat_code_id'   => 1,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_code'  => '2009',
                'item_description'  => 'FCL-DEMMURAGE',
                'sales_acc_code'  => '4.01.06.03',
                'sales_acc_desc'  => 'PPN,PPH,BM,NOTUL,DEMMURAGE',
                'cost_acc_code'  => '1.06.02.02',
                'cost_acc_desc'  => 'BDM EXPORT',
                'vat_code_id'   => 1,
                'currency_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
