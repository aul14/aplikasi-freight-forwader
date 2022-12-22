<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Port;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CcpSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            [
                'code'  => 'UK',
                'name'  => 'UNITED KINGDOM',
                'idd'   => 54,
                'region_code'   => 'AS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'ID',
                'name'  => 'INDONESIA',
                'idd'   => 62,
                'region_code'   => 'AS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'BD',
                'name'  => 'BANGLADESH',
                'idd'   => 880,
                'region_code'   => 'AS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'KR',
                'name'  => 'SOUTH KOREA',
                'idd'   => 82,
                'region_code'   => 'AS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'MY',
                'name'  => 'MALAYSIA',
                'idd'   => 60,
                'region_code'   => 'AS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Port::insert([
            [
                'code'  => 'IDKTK',
                'name'  => 'KUALA TUNGKAL',
                'country_id'   => 2,
                'dg_cargo'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'IDJKT',
                'name'  => 'JAKARTA, INDONESIA',
                'country_id'   => 2,
                'dg_cargo'  => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'NRTHN',
                'name'  => 'NORTHAMPTON',
                'country_id'   => 1,
                'dg_cargo'  => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'BDDAC',
                'name'  => 'DHAKA',
                'country_id'   => 3,
                'dg_cargo'  => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        City::insert([
            [
                'code'  => 'BTN',
                'name'  => 'BANTEN',
                'country_id'   => 2,
                'port_id'   => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'JKT',
                'name'  => 'JAKARTA',
                'country_id'   => 2,
                'port_id'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'SLG',
                'name'  => 'SLOUGH',
                'country_id'   => 1,
                'port_id'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'DAC',
                'name'  => 'DHAKA',
                'country_id'   => 3,
                'port_id'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'SEL',
                'name'  => 'SEOUL, KOREA',
                'country_id'   => 4,
                'port_id'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'PGU',
                'name'  => 'PASIR GUDANG',
                'country_id'   => 5,
                'port_id'   => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
