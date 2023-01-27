<?php

namespace Database\Seeders;

use App\Models\VatCode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VatCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // VatCode::truncate();
        VatCode::insert([
            [
                'code'      => 'ZER',
                'description'   => 'ZERO RATED',
                'type'      => 'ZER',
                'input_ta_code' => "1.07.02.01",
                'output_ta_code' => '2.01.03.01',
                'paid_in_ta_code'   => '',
                'paid_out_ta_code'   => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'FRT1.1',
                'description'   => 'FREIGHT VAT 1.1 %',
                'type'      => 'STD',
                'input_ta_code' => "1.07.02.01",
                'output_ta_code' => '2.01.03.01',
                'paid_in_ta_code'   => '',
                'paid_out_ta_code'   => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'FRT',
                'description'   => 'FREIGHT VAT 1 %',
                'type'      => 'STD',
                'input_ta_code' => "1.07.02.01",
                'output_ta_code' => '2.01.03.01',
                'paid_in_ta_code'   => '8.02.01.04',
                'paid_out_ta_code'   => '1.11.05.03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'STD',
                'description'   => 'LOCAL CHARGES',
                'type'      => '',
                'input_ta_code' => "1.07.02.01",
                'output_ta_code' => '2.01.03.01',
                'paid_in_ta_code'   => '',
                'paid_out_ta_code'   => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'STD11',
                'description'   => 'LOCAL CHARGES 11%',
                'type'      => '',
                'input_ta_code' => "1.07.02.01",
                'output_ta_code' => '2.01.03.01',
                'paid_in_ta_code'   => '',
                'paid_out_ta_code'   => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
