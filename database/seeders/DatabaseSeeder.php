<?php

namespace Database\Seeders;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\ChargeCode;
use App\Models\Uom;
use App\Models\Role;
use App\Models\User;
use App\Models\WtCode;
use App\Models\Company;
use App\Models\JobType;
use App\Models\VatCode;
use App\Models\Currency;
use App\Models\Salesman;
use App\Models\Commodity;
use App\Models\Container;
use App\Models\PartyType;
use App\Models\VendorType;
use App\Models\PaymentTerm;
use App\Models\CustomerType;
use Illuminate\Database\Seeder;
use App\Models\CompanyDetailSatu;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CcpSeederTable;
use Database\Seeders\AdminSeederTable;
use Database\Seeders\BisnisPartySeeder;
use Database\Seeders\ModuleSeederTable;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeederTable::class);
        $this->call(ModuleSeederTable::class);
        $this->call(CcpSeederTable::class);
        $this->call(BisnisPartySeeder::class);
        $this->call(ChargeCodeSeeder::class);
        $this->call(VendorSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ShippingLineSeeder::class);
        $this->call(VesselSeeder::class);

        Airline::insert([
            [
                "code"      => "001",
                "airline_id"      => "AA",
                "name"   => "EXPO FREIGHT BANGLADESH",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "002",
                "airline_id"      => "2G",
                "name"   => "CARGOITALIA",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "004",
                "airline_id"      => "BV",
                "name"   => "BLUE PANORAMA AIRLINES",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "005",
                "airline_id"      => "CO",
                "name"   => "CONTINENTAL AIRLINES",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "006",
                "airline_id"      => "GA",
                "name"   => "GARUDA INDONESIA",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Airport::insert([
            [
                "code"      => "JKT",
                "name"   => "JAKARTA SOEKARNO HATTA",
                "country_id"      => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "CGK",
                "name"   => "SOEKARNO-HATTA, JAKARTA",
                "country_id"      => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "ILA",
                "name"   => "ILLAGA",
                "country_id"      => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "JCN",
                "name"   => "INCHEON HLPT",
                "country_id"      => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "KUL",
                "name"   => "KUALA LUMPUR",
                "country_id"      => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        Commodity::insert([
            [
                "code"      => "COLD",
                "description"   => "COLD SHEAR BLADE FOR ANGLE BAR",
                "dutiable"      => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "SILICON",
                "description"   => "SILICON MANGANESE",
                "dutiable"      => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "code"      => "TUNNEL",
                "description"   => "TUNNEL DRYING OVEN",
                "dutiable"      => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Currency::insert([
            [
                'code'      => 'IDR',
                'description'   => 'INDONESIA RUPIAH',
                'variance_percent'   => 15.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'GBP',
                'description'   => 'UNITED KINGDOM POUNDS',
                'variance_percent'   => 20.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'EUR',
                'description'   => 'EURO',
                'variance_percent'   => 20.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'USD',
                'description'   => 'UNITED STATES DOLLARS',
                'variance_percent'   => 5.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        JobType::insert([
            [
                'type'      => 'FI',
                'description'   => 'SEA FCL IMPORT',
                'module_code'   => 'SI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'LI',
                'description'   => 'SEA LCL IMPORT',
                'module_code'   => 'SI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'NJ',
                'description'   => 'NON JOB',
                'module_code'   => 'MS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'FC',
                'description'   => 'SEA FCL EXPORT',
                'module_code'   => 'SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'GP',
                'description'   => 'SEA CONSOL EXPORT',
                'module_code'   => 'SE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'AI',
                'description'   => 'AIR IMPORT',
                'module_code'   => 'AI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        VatCode::insert([
            [
                'code'      => 'ZER',
                'description'   => 'ZERO RATED',
                'type'      => 'ZER',
                'input_ta_code' => "1.07.02.01",
                'input_ta_desc' => 'PPN MASUKAN DN',
                'output_ta_code' => '2.01.03.01',
                'output_ta_desc' => 'PPN KELUARAN',
                'paid_in_ta_code'   => '',
                'paid_in_ta_desc'   => '',
                'paid_out_ta_code'   => '',
                'paid_out_ta_desc'   => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'FRT1.1',
                'description'   => 'FREIGHT VAT 1.1 %',
                'type'      => 'STD',
                'input_ta_code' => "1.07.02.01",
                'input_ta_desc' => 'PPN MASUKAN DN',
                'output_ta_code' => '2.01.03.01',
                'output_ta_desc' => 'PPN KELUARAN',
                'paid_in_ta_code'   => '',
                'paid_in_ta_desc'   => '',
                'paid_out_ta_code'   => '',
                'paid_out_ta_desc'   => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'FRT',
                'description'   => 'FREIGHT VAT 1 %',
                'type'      => 'STD',
                'input_ta_code' => "1.07.02.01",
                'input_ta_desc' => 'PPN MASUKAN DN',
                'output_ta_code' => '2.01.03.01',
                'output_ta_desc' => 'PPN KELUARAN',
                'paid_in_ta_code'   => '8.02.01.04',
                'paid_in_ta_desc'   => 'PAJAK JASA GIRO',
                'paid_out_ta_code'   => '1.11.05.03',
                'paid_out_ta_desc'   => 'AKUMULASI PENYUSUTAN KOMPUTER DAN SOFTWARE-DCS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Uom::insert([
            [
                'code'  => 'EA',
                'description' => 'EACH',
                'type'  => 'QUANTITY',
                'conversion_factor' => 2.123456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => 'DOC',
                'description' => 'DOCUMENT',
                'type'  => '',
                'conversion_factor' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => '20F',
                'description' => "X 20'",
                'type'  => '',
                'conversion_factor' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        WtCode::insert([
            [
                'code'  => '10%',
                'description' => '10%',
                'tax_rate' => '10.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'  => '15%',
                'description' => '15%',
                'tax_rate' => '15.000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Container::insert([
            [
                'type'      => '40HC',
                'description'      => '40 HIGH CUBE',
                'size'      => '40 FT',
                'no_of_teu'      => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => '20TK',
                'description'      => 'EMPTY TANKS',
                'size'      => '20 FT',
                'no_of_teu'      => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => '40HN',
                'description'      => '40 HC NOR',
                'size'      => '45 FT',
                'no_of_teu'      => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

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

        VendorType::insert([
            [
                'type'      => 'SHP',
                'type_name'   => 'SHIPMENT VENDOR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'OTH',
                'type_name'   => 'OTHERS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Salesman::insert([
            [
                'code'      => 'IMPORT',
                'name'   => 'IMPORT SALES TEAM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'EXPORT',
                'name'   => 'EXPORT SALES TEAM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'MGR/GM/DIR',
                'name'   => 'ANNIE SUTRISNO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        CustomerType::insert([
            [
                'type'      => 'ARO',
                'type_name'   => 'ACCOUNT RECEIVABLE OVERSEAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'      => 'ARL',
                'type_name'   => 'ACCOUNT RECEIVABLE LOCAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        PaymentTerm::insert([
            [
                'code'      => 'CSH',
                'description'   => 'CASH',
                'net_days'     => 0,
                'shipment_date_flag'    => false,
                'service_charge_min'     => 0,
                'service_charge_percent'     => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'LS',
                'description'   => 'LEASING',
                'net_days'     => 0,
                'shipment_date_flag'    => false,
                'service_charge_min'     => 0,
                'service_charge_percent'     => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => '14',
                'description'   => '14 DAYS',
                'net_days'     => 14,
                'shipment_date_flag'    => false,
                'service_charge_min'     => 0,
                'service_charge_percent'     => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'PAY',
                'description'   => 'PERSENTAGE',
                'net_days'     => 100,
                'shipment_date_flag'    => true,
                'service_charge_min'     => 30.00,
                'service_charge_percent'     => 70.000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        PartyType::insert([
            [
                'code'      => 'ADM',
                'description'   => 'ADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SP',
                'description'   => 'SHIPPER',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'SL',
                'description'   => 'SHIPPING LINE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'TRU',
                'description'   => 'TRUCKING',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'CN',
                'description'   => 'CONSIGNEE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code'      => 'OA',
                'description'   => 'OVERSEAS AGENT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        CompanyDetailSatu::insert([
            [
                'company_id'    => 1,
                'type'      => 'Head Office',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Air',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Sea',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Warehouse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id'    => 1,
                'type'      => 'Transport',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
