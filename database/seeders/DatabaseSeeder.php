<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\AdminSeederTable;
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
        // DB::table('users')->insert([
        //     'username' => 'admin',
        //     'firstname' => 'Admin',
        //     'lastname' => 'Admin',
        //     'email' => 'super_admin@gmail.com',
        //     'password' => bcrypt('admin')
        // ]);
        $this->call(AdminSeederTable::class);
        $this->call(ModuleSeederTable::class);
    }
}
