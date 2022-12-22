<?php

namespace Database\Seeders;

use App\Models\BisnisParty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BisnisPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BisnisParty::insert([
            [
                'code'  => 'EXPFRBA',
                'name'  => 'EXPO FREIGHT BANGLADESH',
                'currency_id'   => 4,
                'payment_term_id'   => 1,
                'is_customer'   => true,
                'customer_code' => 'E001',
                'is_vendor'     => false,
                'vendor_code'   => '',
                'address_1'  => '6TH FLOOR, 206/A, TEJGAON I/A,',
                'address_2'  => 'DHAKA 1208, BANGLADESH',
                'city_id'   => 4,
                'country_id'   => 3,
                'port_id'   => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'INFLOIN',
                'name'  => 'INFINITY LOGISTINDO INDONESIA, PT',
                'currency_id'   => 1,
                'payment_term_id'   => 1,
                'is_customer'   => true,
                'customer_code' => 'I001',
                'is_vendor'     => true,
                'vendor_code'   => 'I0001',
                'address_1'  => 'JL. BALIKPAPAN RAYA NO.20B, KELURAHAN CIDENG',
                'address_2'  => 'KECAMATAN GAMBIR, JAKARTA PUSAT 10130',
                'city_id'   => 2,
                'country_id'   => 2,
                'port_id'   => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
