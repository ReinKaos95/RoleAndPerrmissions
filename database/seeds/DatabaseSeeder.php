<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesAndsPermissions::class);
         $this->call(RolesAndsPermissionsSeeder::class);
    }
}
