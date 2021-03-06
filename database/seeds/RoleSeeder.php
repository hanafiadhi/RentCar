<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('roles')->insert([
                'name'=>'admin',
                'guard_name'=> 'web'
            ],[
                'name'=>'user',
                'guard_name'=> 'web'
            ]);
            DB::table('roles')->insert([
                'name'=>'user',
                'guard_name'=> 'web'
            ]);
    }
}
