<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Role::truncate();
        // User::truncate();
        // Module::truncate();
        // Permission::truncate();

        // PROFILE
        $moduleProfile = Module::create([
            'name'      => 'Module Profile'
        ]);


        $permissionModuleProfile = [
            [
                'name' => 'manage-profile',
                'display_name' => 'Manage Profile',
                'description' => 'Can Manage Profile'
            ],
            [
                'name' => 'edit-profile',
                'display_name' => 'Edit Profile',
                'description' => 'Can Edit Profile'
            ]
        ];

        foreach ($permissionModuleProfile as $val) {
            Permission::create([
                'name' => $val['name'],
                'display_name' => $val['display_name'],
                'description' => $val['description'],
                'module_id' => $moduleProfile->id
            ]);
        }

        // MODULE
        $module = Module::create([
            'name' => 'Module'
        ]);

        $permissionModule = [
            [
                'name' => 'manage-module',
                'display_name' => 'Manage Module',
                'description' => 'Can Manage Module'
            ],
            [
                'name' => 'create-module',
                'display_name' => 'Create Module',
                'description' => 'Can Create Module'
            ],
            [
                'name' => 'edit-module',
                'display_name' => 'Edit Module',
                'description' => 'Can Edit Module'
            ],
            [
                'name' => 'delete-module',
                'display_name' => 'Delete Module',
                'description' => 'Can Menghapus Module'
            ]
        ];

        foreach ($permissionModule as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $module->id
            ]);
        }

        // Permission
        $modulePermission = Module::create([
            'name' => 'Module Permission'
        ]);

        $permissionModulePermission = [
            [
                'name' => 'manage-permission',
                'display_name' => 'Manage Permission',
                'description' => 'Can Manage Permission'
            ],
            [
                'name' => 'create-permission',
                'display_name' => 'Create Permission',
                'description' => 'Can Tambah Permission'
            ],
            [
                'name' => 'edit-permission',
                'display_name' => 'Edit Permission',
                'description' => 'Can Edit Permission'
            ],
            [
                'name' => 'delete-permission',
                'display_name' => 'Delete Permission',
                'description' => 'Can Delete Permission'
            ]
        ];

        foreach ($permissionModulePermission as $key) {

            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $modulePermission->id
            ]);
        }

        // USER
        $moduleUser = Module::create([
            'name' => 'Module User Management'
        ]);

        $permissionModuleUser = [
            [
                'name' => 'manage-user',
                'display_name' => 'Manage User',
                'description' => 'Can Manage User'
            ],
            [
                'name' => 'create-user',
                'display_name' => 'Create User',
                'description' => 'Can Create User'
            ],
            [
                'name' => 'edit-user',
                'display_name' => 'Edit User',
                'description' => 'Can Edit User'
            ],
            [
                'name' => 'delete-user',
                'display_name' => 'Delete User',
                'description' => 'Can Delete User'
            ],
            [
                'name' => 'reset-password',
                'display_name' => 'Reset Password User',
                'description' => 'Can Mengganti Password User'
            ],
            [
                'name' => 'manage-account',
                'display_name' => 'Manage Account Profile',
                'description' => 'Can Manage Profile'
            ],
            [
                'name' => 'edit-account',
                'display_name' => 'Edit Account Profile',
                'description' => 'Can Edit Profile'
            ],
            [
                'name' => 'change-password-account',
                'display_name' => 'Reset Password Profile',
                'description' => 'Can Mengganti Password Profile'
            ],
        ];

        foreach ($permissionModuleUser as $key) {

            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleUser->id
            ]);
        }

        // Role
        $moduleRole = Module::create([
            'name' => 'Module Role'
        ]);

        $permissionModuleRole = [
            [
                'name' => 'manage-role',
                'display_name' => 'Manage Role',
                'description' => 'Can Manage Role'
            ],
            [
                'name' => 'create-role',
                'display_name' => 'Create Role',
                'description' => 'Can Create Role'
            ],
            [
                'name' => 'edit-role',
                'display_name' => 'Edit Role',
                'description' => 'Can Edit Role'
            ],
            [
                'name' => 'delete-role',
                'display_name' => 'Delete Role',
                'description' => 'Can Delete Role'
            ],
            [
                'name' => 'manage-role-access',
                'display_name' => 'Manage Role Access',
                'description' => 'Can Manage Role Access'
            ],
        ];

        foreach ($permissionModuleRole as $key) {

            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleRole->id
            ]);
        }

        // COMPANY PROFILE
        $moduleCompany = Module::create([
            'name' => 'Module Company Profile'
        ]);

        $permissionmoduleCompany = [
            [
                'name' => 'manage-company',
                'display_name' => 'Manage Company Profile',
                'description' => 'Can Manage Company Profile'
            ],
            [
                'name' => 'edit-company',
                'display_name' => 'Edit Company Profile',
                'description' => 'Can Edit Company'
            ],
        ];

        foreach ($permissionmoduleCompany as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCompany->id
            ]);
        }

        // COUNTRY
        $moduleCountry = Module::create([
            'name' => 'Module Country'
        ]);

        $permissionmoduleCountry = [
            [
                'name' => 'manage-country',
                'display_name' => 'Manage Country',
                'description' => 'Can Manage Country'
            ],
            [
                'name' => 'create-country',
                'display_name' => 'Create Country',
                'description' => 'Can Create Country'
            ],
            [
                'name' => 'edit-country',
                'display_name' => 'Edit Country',
                'description' => 'Can Edit Country'
            ],
            [
                'name' => 'delete-country',
                'display_name' => 'Delete Country',
                'description' => 'Can Delete Country'
            ]
        ];

        foreach ($permissionmoduleCountry as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCountry->id
            ]);
        }

        // CITY
        $moduleCity = Module::create([
            'name' => 'Module City'
        ]);

        $permissionmoduleCity = [
            [
                'name' => 'manage-city',
                'display_name' => 'Manage City',
                'description' => 'Can Manage City'
            ],
            [
                'name' => 'create-city',
                'display_name' => 'Create City',
                'description' => 'Can Create City'
            ],
            [
                'name' => 'edit-city',
                'display_name' => 'Edit City',
                'description' => 'Can Edit City'
            ],
            [
                'name' => 'delete-city',
                'display_name' => 'Delete City',
                'description' => 'Can Delete City'
            ]
        ];

        foreach ($permissionmoduleCity as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCity->id
            ]);
        }

        // PORT
        $modulePort = Module::create([
            'name' => 'Module Port'
        ]);

        $permissionmodulePort = [
            [
                'name' => 'manage-port',
                'display_name' => 'Manage Port',
                'description' => 'Can Manage Port'
            ],
            [
                'name' => 'create-port',
                'display_name' => 'Create Port',
                'description' => 'Can Create Port'
            ],
            [
                'name' => 'edit-port',
                'display_name' => 'Edit Port',
                'description' => 'Can Edit Port'
            ],
            [
                'name' => 'delete-port',
                'display_name' => 'Delete Port',
                'description' => 'Can Delete Port'
            ]
        ];

        foreach ($permissionmodulePort as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $modulePort->id
            ]);
        }

        // COMMODITY
        $moduleCommodity = Module::create([
            'name' => 'Module Commodity'
        ]);

        $permissionmoduleCommodity = [
            [
                'name' => 'manage-commodity',
                'display_name' => 'Manage Commodity',
                'description' => 'Can Manage Commodity'
            ],
            [
                'name' => 'create-commodity',
                'display_name' => 'Create Commodity',
                'description' => 'Can Create Commodity'
            ],
            [
                'name' => 'edit-commodity',
                'display_name' => 'Edit Commodity',
                'description' => 'Can Edit Commodity'
            ],
            [
                'name' => 'delete-commodity',
                'display_name' => 'Delete Commodity',
                'description' => 'Can Delete Commodity'
            ]
        ];

        foreach ($permissionmoduleCommodity as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCommodity->id
            ]);
        }

        // CONTAINER
        $moduleContainer = Module::create([
            'name' => 'Module Container'
        ]);

        $permissionmoduleContainer = [
            [
                'name' => 'manage-container',
                'display_name' => 'Manage Container',
                'description' => 'Can Manage Container'
            ],
            [
                'name' => 'create-container',
                'display_name' => 'Create Container',
                'description' => 'Can Create Container'
            ],
            [
                'name' => 'edit-container',
                'display_name' => 'Edit Container',
                'description' => 'Can Edit Container'
            ],
            [
                'name' => 'delete-container',
                'display_name' => 'Delete Container',
                'description' => 'Can Delete Container'
            ]
        ];

        foreach ($permissionmoduleContainer as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleContainer->id
            ]);
        }

        // JOB TYPE
        $moduleJobType = Module::create([
            'name' => 'Module JobType'
        ]);

        $permissionmoduleJobType = [
            [
                'name' => 'manage-jobtype',
                'display_name' => 'Manage JobType',
                'description' => 'Can Manage JobType'
            ],
            [
                'name' => 'create-jobtype',
                'display_name' => 'Create JobType',
                'description' => 'Can Create JobType'
            ],
            [
                'name' => 'edit-jobtype',
                'display_name' => 'Edit JobType',
                'description' => 'Can Edit JobType'
            ],
            [
                'name' => 'delete-jobtype',
                'display_name' => 'Delete JobType',
                'description' => 'Can Delete JobType'
            ]
        ];

        foreach ($permissionmoduleJobType as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleJobType->id
            ]);
        }

        // CURRENCY CODE
        $moduleCurrency = Module::create([
            'name' => 'Module Currency Code'
        ]);

        $permissionmoduleCurrency = [
            [
                'name' => 'manage-currency',
                'display_name' => 'Manage Currency Code',
                'description' => 'Can Manage Currency Code'
            ],
            [
                'name' => 'create-currency',
                'display_name' => 'Create Currency Code',
                'description' => 'Can Create Currency Code'
            ],
            [
                'name' => 'edit-currency',
                'display_name' => 'Edit Currency Code',
                'description' => 'Can Edit Currency Code'
            ],
            [
                'name' => 'delete-currency',
                'display_name' => 'Delete Currency Code',
                'description' => 'Can Delete Currency Code'
            ]
        ];

        foreach ($permissionmoduleCurrency as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCurrency->id
            ]);
        }

        // VAT CODE
        $moduleVat = Module::create([
            'name' => 'Module Vat Code'
        ]);

        $permissionmoduleVat = [
            [
                'name' => 'manage-vat',
                'display_name' => 'Manage Vat Code',
                'description' => 'Can Manage Vat Code'
            ],
            [
                'name' => 'create-vat',
                'display_name' => 'Create Vat Code',
                'description' => 'Can Create Vat Code'
            ],
            [
                'name' => 'edit-vat',
                'display_name' => 'Edit Vat Code',
                'description' => 'Can Edit Vat Code'
            ],
            [
                'name' => 'delete-vat',
                'display_name' => 'Delete Vat Code',
                'description' => 'Can Delete Vat Code'
            ]
        ];

        foreach ($permissionmoduleVat as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleVat->id
            ]);
        }

        // UOM
        $moduleUom = Module::create([
            'name' => 'Module Uom'
        ]);

        $permissionmoduleUom = [
            [
                'name' => 'manage-uom',
                'display_name' => 'Manage Uom',
                'description' => 'Can Manage Uom'
            ],
            [
                'name' => 'create-uom',
                'display_name' => 'Create Uom',
                'description' => 'Can Create Uom'
            ],
            [
                'name' => 'edit-uom',
                'display_name' => 'Edit Uom',
                'description' => 'Can Edit Uom'
            ],
            [
                'name' => 'delete-uom',
                'display_name' => 'Delete Uom',
                'description' => 'Can Delete Uom'
            ]
        ];

        foreach ($permissionmoduleUom as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleUom->id
            ]);
        }

        // CHARGE CODE
        $moduleChargeCode = Module::create([
            'name' => 'Module Charge Code'
        ]);

        $permissionmoduleChargeCode = [
            [
                'name' => 'manage-charge_code',
                'display_name' => 'Manage Charge Code',
                'description' => 'Can Manage Charge Code'
            ],
            [
                'name' => 'create-charge_code',
                'display_name' => 'Create Charge Code',
                'description' => 'Can Create Charge Code'
            ],
            [
                'name' => 'edit-charge_code',
                'display_name' => 'Edit Charge Code',
                'description' => 'Can Edit Charge Code'
            ],
            [
                'name' => 'delete-charge_code',
                'display_name' => 'Delete Charge Code',
                'description' => 'Can Delete Charge Code'
            ]
        ];

        foreach ($permissionmoduleChargeCode as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleChargeCode->id
            ]);
        }

        // SYSTEM NUMBERING
        $moduleSystemNumbering = Module::create([
            'name' => 'Module System Numbering'
        ]);

        $permissionmoduleSystemNumbering = [
            [
                'name' => 'manage-sys_numbering',
                'display_name' => 'Manage System Numbering',
                'description' => 'Can Manage System Numbering'
            ],
            [
                'name' => 'edit-sys_numbering',
                'display_name' => 'Edit System Numbering',
                'description' => 'Can Edit System Numbering'
            ],
        ];

        foreach ($permissionmoduleSystemNumbering as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleSystemNumbering->id
            ]);
        }

        // Withholding Tax
        $moduleWtCode = Module::create([
            'name' => 'Module Withholding Tax'
        ]);

        $permissionmoduleWtCode = [
            [
                'name' => 'manage-wt_code',
                'display_name' => 'Manage Withholding Tax',
                'description' => 'Can Manage Withholding Tax'
            ],
            [
                'name' => 'create-wt_code',
                'display_name' => 'Create Withholding Tax',
                'description' => 'Can Create Withholding Tax'
            ],
            [
                'name' => 'edit-wt_code',
                'display_name' => 'Edit Withholding Tax',
                'description' => 'Can Edit Withholding Tax'
            ],
            [
                'name' => 'delete-wt_code',
                'display_name' => 'Delete Withholding Tax',
                'description' => 'Can Delete Withholding Tax'
            ]
        ];

        foreach ($permissionmoduleWtCode as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleWtCode->id
            ]);
        }

        // CHARGE TABLE
        $moduleChargeTable = Module::create([
            'name' => 'Module Charge Table'
        ]);

        $permissionmoduleChargeTable = [
            [
                'name' => 'manage-charge_table',
                'display_name' => 'Manage Charge Table',
                'description' => 'Can Manage Charge Table'
            ],
            [
                'name' => 'create-charge_table',
                'display_name' => 'Create Charge Table',
                'description' => 'Can Create Charge Table'
            ],
            [
                'name' => 'edit-charge_table',
                'display_name' => 'Edit Charge Table',
                'description' => 'Can Edit Charge Table'
            ],
            [
                'name' => 'delete-charge_table',
                'display_name' => 'Delete Charge Table',
                'description' => 'Can Delete Charge Table'
            ]
        ];

        foreach ($permissionmoduleChargeTable as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleChargeTable->id
            ]);
        }

        // COST TABLE
        $moduleCostTable = Module::create([
            'name' => 'Module Cost Table'
        ]);

        $permissionmoduleCostTable = [
            [
                'name' => 'manage-cost_table',
                'display_name' => 'Manage Cost Table',
                'description' => 'Can Manage Cost Table'
            ],
            [
                'name' => 'create-cost_table',
                'display_name' => 'Create Cost Table',
                'description' => 'Can Create Cost Table'
            ],
            [
                'name' => 'edit-cost_table',
                'display_name' => 'Edit Cost Table',
                'description' => 'Can Edit Cost Table'
            ],
            [
                'name' => 'delete-cost_table',
                'display_name' => 'Delete Cost Table',
                'description' => 'Can Delete Cost Table'
            ]
        ];

        foreach ($permissionmoduleCostTable as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleCostTable->id
            ]);
        }

        // PARTY TYPE
        $modulePartyType = Module::create([
            'name' => 'Module Party Type'
        ]);

        $permissionmodulePartyType = [
            [
                'name' => 'manage-party_type',
                'display_name' => 'Manage Party Type',
                'description' => 'Can Manage Party Type'
            ],
            [
                'name' => 'create-party_type',
                'display_name' => 'Create Party Type',
                'description' => 'Can Create Party Type'
            ],
            [
                'name' => 'edit-party_type',
                'display_name' => 'Edit Party Type',
                'description' => 'Can Edit Party Type'
            ],
            [
                'name' => 'delete-party_type',
                'display_name' => 'Delete Party Type',
                'description' => 'Can Delete Party Type'
            ]
        ];

        foreach ($permissionmodulePartyType as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $modulePartyType->id
            ]);
        }

        // PAYMENT TERM
        $modulePayTerm = Module::create([
            'name' => 'Module Payment Term'
        ]);

        $permissionmodulePayTerm = [
            [
                'name' => 'manage-pay_term',
                'display_name' => 'Manage Payment Term',
                'description' => 'Can Manage Payment Term'
            ],
            [
                'name' => 'create-pay_term',
                'display_name' => 'Create Payment Term',
                'description' => 'Can Create Payment Term'
            ],
            [
                'name' => 'edit-pay_term',
                'display_name' => 'Edit Payment Term',
                'description' => 'Can Edit Payment Term'
            ],
            [
                'name' => 'delete-pay_term',
                'display_name' => 'Delete Payment Term',
                'description' => 'Can Delete Payment Term'
            ]
        ];

        foreach ($permissionmodulePayTerm as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $modulePayTerm->id
            ]);
        }

        // SALESMAN
        $moduleSalesman = Module::create([
            'name' => 'Module Salesman'
        ]);

        $permissionmoduleSalesman = [
            [
                'name' => 'manage-salesman',
                'display_name' => 'Manage Salesman',
                'description' => 'Can Manage Salesman'
            ],
            [
                'name' => 'create-salesman',
                'display_name' => 'Create Salesman',
                'description' => 'Can Create Salesman'
            ],
            [
                'name' => 'edit-salesman',
                'display_name' => 'Edit Salesman',
                'description' => 'Can Edit Salesman'
            ],
            [
                'name' => 'delete-salesman',
                'display_name' => 'Delete Salesman',
                'description' => 'Can Delete Salesman'
            ]
        ];

        foreach ($permissionmoduleSalesman as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleSalesman->id
            ]);
        }


        // BUSSINESS PARTY
        $moduleBisnis = Module::create([
            'name' => 'Module Business Party'
        ]);

        $permissionmoduleBisnis = [
            [
                'name' => 'manage-bisnis_party',
                'display_name' => 'Manage Business Party',
                'description' => 'Can Manage Business Party'
            ],
            [
                'name' => 'create-bisnis_party',
                'display_name' => 'Create Business Party',
                'description' => 'Can Create Business Party'
            ],
            [
                'name' => 'edit-bisnis_party',
                'display_name' => 'Edit Business Party',
                'description' => 'Can Edit Business Party'
            ],
            [
                'name' => 'delete-bisnis_party',
                'display_name' => 'Delete Business Party',
                'description' => 'Can Delete Business Party'
            ]
        ];

        foreach ($permissionmoduleBisnis as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleBisnis->id
            ]);
        }

        // AIRPORT
        $moduleAirport = Module::create([
            'name' => 'Module Airport'
        ]);

        $permissionmoduleAirport = [
            [
                'name' => 'manage-airport',
                'display_name' => 'Manage Airport',
                'description' => 'Can Manage Airport'
            ],
            [
                'name' => 'create-airport',
                'display_name' => 'Create Airport',
                'description' => 'Can Create Airport'
            ],
            [
                'name' => 'edit-airport',
                'display_name' => 'Edit Airport',
                'description' => 'Can Edit Airport'
            ],
            [
                'name' => 'delete-airport',
                'display_name' => 'Delete Airport',
                'description' => 'Can Delete Airport'
            ]
        ];

        foreach ($permissionmoduleAirport as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleAirport->id
            ]);
        }

        // AIRLINE
        $moduleAirline = Module::create([
            'name' => 'Module Airline'
        ]);

        $permissionmoduleAirline = [
            [
                'name' => 'manage-airline',
                'display_name' => 'Manage Airline',
                'description' => 'Can Manage Airline'
            ],
            [
                'name' => 'create-airline',
                'display_name' => 'Create Airline',
                'description' => 'Can Create Airline'
            ],
            [
                'name' => 'edit-airline',
                'display_name' => 'Edit Airline',
                'description' => 'Can Edit Airline'
            ],
            [
                'name' => 'delete-airline',
                'display_name' => 'Delete Airline',
                'description' => 'Can Delete Airline'
            ]
        ];

        foreach ($permissionmoduleAirline as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleAirline->id
            ]);
        }

        // SHIPPINGLINE
        $moduleShippingline = Module::create([
            'name' => 'Module Shippingline'
        ]);

        $permissionmoduleShippingline = [
            [
                'name' => 'manage-shipline',
                'display_name' => 'Manage Shippingline',
                'description' => 'Can Manage Shippingline'
            ],
            [
                'name' => 'create-shipline',
                'display_name' => 'Create Shippingline',
                'description' => 'Can Create Shippingline'
            ],
            [
                'name' => 'edit-shipline',
                'display_name' => 'Edit Shippingline',
                'description' => 'Can Edit Shippingline'
            ],
            [
                'name' => 'delete-shipline',
                'display_name' => 'Delete Shippingline',
                'description' => 'Can Delete Shippingline'
            ]
        ];

        foreach ($permissionmoduleShippingline as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleShippingline->id
            ]);
        }

        // VESSEL
        $moduleVessel = Module::create([
            'name' => 'Module Vessel'
        ]);

        $permissionmoduleVessel = [
            [
                'name' => 'manage-vessel',
                'display_name' => 'Manage Vessel',
                'description' => 'Can Manage Vessel'
            ],
            [
                'name' => 'create-vessel',
                'display_name' => 'Create Vessel',
                'description' => 'Can Create Vessel'
            ],
            [
                'name' => 'edit-vessel',
                'display_name' => 'Edit Vessel',
                'description' => 'Can Edit Vessel'
            ],
            [
                'name' => 'delete-vessel',
                'display_name' => 'Delete Vessel',
                'description' => 'Can Delete Vessel'
            ]
        ];

        foreach ($permissionmoduleVessel as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleVessel->id
            ]);
        }

        // INCOMTERMS
        $moduleIncoterms = Module::create([
            'name' => 'Module Incoterms'
        ]);

        $permissionmoduleIncoterms = [
            [
                'name' => 'manage-incoterms',
                'display_name' => 'Manage Incoterms',
                'description' => 'Can Manage Incoterms'
            ],
            [
                'name' => 'create-incoterms',
                'display_name' => 'Create Incoterms',
                'description' => 'Can Create Incoterms'
            ],
            [
                'name' => 'edit-incoterms',
                'display_name' => 'Edit Incoterms',
                'description' => 'Can Edit Incoterms'
            ],
            [
                'name' => 'delete-incoterms',
                'display_name' => 'Delete Incoterms',
                'description' => 'Can Delete Incoterms'
            ]
        ];

        foreach ($permissionmoduleIncoterms as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleIncoterms->id
            ]);
        }

        // QUOTATION TYPE
        $moduleQuotationType = Module::create([
            'name' => 'Module Quotation Type'
        ]);

        $permissionmoduleQuotationType = [
            [
                'name' => 'manage-quotation_type',
                'display_name' => 'Manage Quotation Type',
                'description' => 'Can Manage Quotation Type'
            ],
            [
                'name' => 'create-quotation_type',
                'display_name' => 'Create Quotation Type',
                'description' => 'Can Create Quotation Type'
            ],
            [
                'name' => 'edit-quotation_type',
                'display_name' => 'Edit Quotation Type',
                'description' => 'Can Edit Quotation Type'
            ],
            [
                'name' => 'delete-quotation_type',
                'display_name' => 'Delete Quotation Type',
                'description' => 'Can Delete Quotation Type'
            ]
        ];

        foreach ($permissionmoduleQuotationType as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleQuotationType->id
            ]);
        }

        // SEA FREIGHT QUOTATION
        $moduleSeaQuotation = Module::create([
            'name' => 'Module Sea Freight Quotation'
        ]);

        $permissionmoduleSeaQuotation = [
            [
                'name' => 'manage-sea_quot',
                'display_name' => 'Manage Sea Freight Quotation',
                'description' => 'Can Manage Sea Freight Quotation'
            ],
            [
                'name' => 'create-sea_quot',
                'display_name' => 'Create Sea Freight Quotation',
                'description' => 'Can Create Sea Freight Quotation'
            ],
            [
                'name' => 'edit-sea_quot',
                'display_name' => 'Edit Sea Freight Quotation',
                'description' => 'Can Edit Sea Freight Quotation'
            ],
            [
                'name' => 'delete-sea_quot',
                'display_name' => 'Delete Sea Freight Quotation',
                'description' => 'Can Delete Sea Freight Quotation'
            ]
        ];

        foreach ($permissionmoduleSeaQuotation as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleSeaQuotation->id
            ]);
        }

        // DELIVERY TYPE
        $moduleDeliveryType = Module::create([
            'name' => 'Module Delivery Type'
        ]);

        $permissionmoduleDeliveryType = [
            [
                'name' => 'manage-del_type',
                'display_name' => 'Manage Delivery Type',
                'description' => 'Can Manage Delivery Type'
            ],
            [
                'name' => 'create-del_type',
                'display_name' => 'Create Delivery Type',
                'description' => 'Can Create Delivery Type'
            ],
            [
                'name' => 'edit-del_type',
                'display_name' => 'Edit Delivery Type',
                'description' => 'Can Edit Delivery Type'
            ],
            [
                'name' => 'delete-del_type',
                'display_name' => 'Delete Delivery Type',
                'description' => 'Can Delete Delivery Type'
            ]
        ];

        foreach ($permissionmoduleDeliveryType as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleDeliveryType->id
            ]);
        }

        // AIR FREIGHT QUOTATION
        $moduleAirQuotation = Module::create([
            'name' => 'Module Air Freight Quotation'
        ]);

        $permissionmoduleAirQuotation = [
            [
                'name' => 'manage-air_quot',
                'display_name' => 'Manage Air Freight Quotation',
                'description' => 'Can Manage Air Freight Quotation'
            ],
            [
                'name' => 'create-air_quot',
                'display_name' => 'Create Air Freight Quotation',
                'description' => 'Can Create Air Freight Quotation'
            ],
            [
                'name' => 'edit-air_quot',
                'display_name' => 'Edit Air Freight Quotation',
                'description' => 'Can Edit Air Freight Quotation'
            ],
            [
                'name' => 'delete-air_quot',
                'display_name' => 'Delete Air Freight Quotation',
                'description' => 'Can Delete Air Freight Quotation'
            ]
        ];

        foreach ($permissionmoduleAirQuotation as $key) {
            Permission::create([
                'name' => $key['name'],
                'display_name' => $key['display_name'],
                'description' => $key['description'],
                'module_id' => $moduleAirQuotation->id
            ]);
        }

        // SUPER ADMIN RULES
        Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin',
            'description' => 'Ini adalah Role Super Admin'
        ]);

        $adminRole = Role::where('name', 'super_admin')->first();

        $adminPermission = [
            'manage-profile',
            'edit-profile',
            'manage-module',
            'create-module',
            'edit-module',
            'delete-module',
            'manage-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'manage-user',
            'create-user',
            'edit-user',
            'delete-user',
            'reset-password',
            'manage-account',
            'edit-account',
            'change-password-account',
            'manage-role',
            'create-role',
            'edit-role',
            'delete-role',
            'manage-role-access',
            'manage-company',
            'edit-company',
            'manage-country',
            'create-country',
            'edit-country',
            'delete-country',
            'manage-city',
            'create-city',
            'edit-city',
            'delete-city',
            'manage-port',
            'create-port',
            'edit-port',
            'delete-port',
            'manage-commodity',
            'create-commodity',
            'edit-commodity',
            'delete-commodity',
            'manage-container',
            'create-container',
            'edit-container',
            'delete-container',
            'manage-jobtype',
            'create-jobtype',
            'edit-jobtype',
            'delete-jobtype',
            'manage-currency',
            'create-currency',
            'edit-currency',
            'delete-currency',
            'manage-vat',
            'create-vat',
            'edit-vat',
            'delete-vat',
            'manage-uom',
            'create-uom',
            'edit-uom',
            'delete-uom',
            'manage-charge_code',
            'create-charge_code',
            'edit-charge_code',
            'delete-charge_code',
            'manage-wt_code',
            'create-wt_code',
            'edit-wt_code',
            'delete-wt_code',
            'manage-sys_numbering',
            'edit-sys_numbering',
            'manage-charge_table',
            'create-charge_table',
            'edit-charge_table',
            'delete-charge_table',
            'manage-cost_table',
            'create-cost_table',
            'edit-cost_table',
            'delete-cost_table',
            'manage-party_type',
            'create-party_type',
            'edit-party_type',
            'delete-party_type',
            'manage-pay_term',
            'create-pay_term',
            'edit-pay_term',
            'delete-pay_term',
            'manage-salesman',
            'create-salesman',
            'edit-salesman',
            'delete-salesman',
            'manage-bisnis_party',
            'create-bisnis_party',
            'edit-bisnis_party',
            'delete-bisnis_party',
            'manage-airport',
            'create-airport',
            'edit-airport',
            'delete-airport',
            'manage-airline',
            'create-airline',
            'edit-airline',
            'delete-airline',
            'manage-shipline',
            'create-shipline',
            'edit-shipline',
            'delete-shipline',
            'manage-vessel',
            'create-vessel',
            'edit-vessel',
            'delete-vessel',
            'manage-incoterms',
            'create-incoterms',
            'edit-incoterms',
            'delete-incoterms',
            'manage-quotation_type',
            'create-quotation_type',
            'edit-quotation_type',
            'delete-quotation_type',
            'manage-sea_quot',
            'create-sea_quot',
            'edit-sea_quot',
            'delete-sea_quot',
            'manage-del_type',
            'create-del_type',
            'edit-del_type',
            'delete-del_type',
            'manage-air_quot',
            'create-air_quot',
            'edit-air_quot',
            'delete-air_quot',
        ];

        $userAdmin = User::create([
            'username' => 'super_admin',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'super_admin@gmail.com',
            'password' => 'admin'
        ]);

        foreach ($adminPermission as $key => $ap) {
            $permission = Permission::where('name', $ap)->first();
            $adminRole->attachPermission($permission->id);
        }

        $userAdmin->attachRole($adminRole);


        // OWNER RULES
        Role::create([
            'name' => 'owner',
            'display_name' => 'Owner',
            'description' => 'Ini adalah Role Owner'
        ]);

        $ownerRole = Role::where('name', 'owner')->first();

        $ownerPermission = [
            'manage-profile',
            'edit-profile',
            'manage-module',
            'create-module',
            'edit-module',
            'delete-module',
            'manage-permission',
            'create-permission',
            'edit-permission',
            'delete-permission',
            'manage-user',
            'create-user',
            'edit-user',
            'delete-user',
            'reset-password',
            'manage-account',
            'edit-account',
            'change-password-account',
            'manage-role',
            'create-role',
            'edit-role',
            'delete-role',
            'manage-role-access',
            'manage-company',
            'edit-company',
            'manage-country',
            'create-country',
            'edit-country',
            'delete-country',
            'manage-city',
            'create-city',
            'edit-city',
            'delete-city',
            'manage-port',
            'create-port',
            'edit-port',
            'delete-port',
            'manage-commodity',
            'create-commodity',
            'edit-commodity',
            'delete-commodity',
            'manage-container',
            'create-container',
            'edit-container',
            'delete-container',
            'manage-jobtype',
            'create-jobtype',
            'edit-jobtype',
            'delete-jobtype',
            'manage-currency',
            'create-currency',
            'edit-currency',
            'delete-currency',
            'manage-vat',
            'create-vat',
            'edit-vat',
            'delete-vat',
            'manage-uom',
            'create-uom',
            'edit-uom',
            'delete-uom',
            'manage-charge_code',
            'create-charge_code',
            'edit-charge_code',
            'delete-charge_code',
            'manage-wt_code',
            'create-wt_code',
            'edit-wt_code',
            'delete-wt_code',
            'manage-sys_numbering',
            'edit-sys_numbering',
            'manage-charge_table',
            'create-charge_table',
            'edit-charge_table',
            'delete-charge_table',
            'manage-cost_table',
            'create-cost_table',
            'edit-cost_table',
            'delete-cost_table',
            'manage-party_type',
            'create-party_type',
            'edit-party_type',
            'delete-party_type',
            'manage-pay_term',
            'create-pay_term',
            'edit-pay_term',
            'delete-pay_term',
            'manage-salesman',
            'create-salesman',
            'edit-salesman',
            'delete-salesman',
            'manage-bisnis_party',
            'create-bisnis_party',
            'edit-bisnis_party',
            'delete-bisnis_party',
            'manage-airport',
            'create-airport',
            'edit-airport',
            'delete-airport',
            'manage-airline',
            'create-airline',
            'edit-airline',
            'delete-airline',
            'manage-shipline',
            'create-shipline',
            'edit-shipline',
            'delete-shipline',
            'manage-vessel',
            'create-vessel',
            'edit-vessel',
            'delete-vessel',
            'manage-incoterms',
            'create-incoterms',
            'edit-incoterms',
            'delete-incoterms',
            'manage-quotation_type',
            'create-quotation_type',
            'edit-quotation_type',
            'delete-quotation_type',
            'manage-sea_quot',
            'create-sea_quot',
            'edit-sea_quot',
            'delete-sea_quot',
            'manage-del_type',
            'create-del_type',
            'edit-del_type',
            'delete-del_type',
            'manage-air_quot',
            'create-air_quot',
            'edit-air_quot',
            'delete-air_quot',
        ];

        $userOwner = User::create([
            'username' => 'owner',
            'firstname' => 'Project',
            'lastname' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => 'owner'
        ]);

        foreach ($ownerPermission as $key => $ap) {
            $permissionOwner = Permission::where('name', $ap)->first();
            $ownerRole->attachPermission($permissionOwner->id);
        }

        $userOwner->attachRole($ownerRole);

        // Operator
        Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Ini adalah Role User'
        ]);

        $operatorRole = Role::where('name', 'user')->first();
        $operatorPermission = [
            'manage-profile',
            'edit-profile',
        ];

        $operatorUser = User::create([
            'username' => 'user',
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user'
        ]);

        foreach ($operatorPermission as $key => $ap) {
            # code...
            $permission = Permission::where('name', $ap)->first();
            $operatorRole->attachPermission($permission->id);
        }

        $operatorUser->attachRole($operatorUser);

        $user1 =  User::create([
            'username' => 'user1',
            'firstname' => 'User',
            'lastname' => '1',
            'email' => 'user1@gmail.com',
            'password' => 'user1'
        ]);
        $user1Role = Role::where('name', 'super_admin')->first();
        $user1->attachRole($user1Role);
    }
}
