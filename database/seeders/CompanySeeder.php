<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use App\Models\CompanyDetailSatu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::insert([
            [
                'name'      => 'PT. WINDU PERSADA CARGO',
                'branch_name'   => 'WPCJKT',
                'currency_id'   => 1,
                'web_site'      => 'http://www.wpclogistics.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        CompanyDetailSatu::insert([
            [
                'company_id'    => 1,
                'type'      => 'Head Office',
                'address'   => 'Jl. Kesehatan Raya No. 54B Tanah Abang IV, Jakarta Pusat 10160 – Indonesia.',
                'city_id'   => 2,
                'country_id'   => 2,
                'telp'  => '21 3521040',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Air',
                'address'   => null,
                'city_id'   => null,
                'country_id'   => null,
                'telp'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Sea',
                'address'   => null,
                'city_id'   => null,
                'country_id'   => null,
                'telp'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Warehouse',
                'address'   => null,
                'city_id'   => null,
                'country_id'   => null,
                'telp'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Transport',
                'address'   => null,
                'city_id'   => null,
                'country_id'   => null,
                'telp'   => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
