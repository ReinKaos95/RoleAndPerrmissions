<?php

use Illuminate\Database\Seeder;
use App\User;
class RolesAndsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 public function run()
    {
       $editor = User::Create([
       	'name' => 'saul',
       	'email' => 'saul@amauri.com',
       	'password' => bcrypt('123456')	
       ]);
       $editor->assignRole('editor');

       $moderador = User::Create([
       	'name' => 'marcos',
       	'email' => 'marcos@tonkin.com',
       	'password' => bcrypt('654321')
       ]);
       $moderador->assignRole('moderator');

       $superadmin = User::Create([
       	'name' => 'walter',
       	'email' => 'walter@gutierrez.com',
       	'password' => bcrypt('000000')
       ]);
       $superadmin->assignRole('super-admin');
    }
}
