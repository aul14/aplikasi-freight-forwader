<?php

namespace Database\Seeders;

use App\Models\QuotationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuotationType::insert([
            [
                'type'      => 'WH',
                'description'   => 'WAREHOUSE & DISTRIBUTION',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'EXP',
                'description'   => 'EXPORT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'IMP',
                'description'   => 'IMPORT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'DOMS',
                'description'   => 'DOMESTIC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'LS',
                'description'   => 'LOCAL SALES',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
