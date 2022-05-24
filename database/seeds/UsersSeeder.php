<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $admin = User::create([
                'username' => 12345678,
                'name'=>'admin',
                'email' => 'davidnugroho644@gmail.com',
                'password'=> bcrypt('12345678'),
                'email_verified_at' => now(),
                'cek'=>'full'
            ]);

            $admin->assignRole('admin');
            
            $user = User::create([
                'username' => 123456789,
                'name'=>'user',
                'email' => 'user@gmail.com',
                'password'=> bcrypt('12345678'),
                'email_verified_at' => now(),
                'no_handphone' => 62891829918299,
                'gender'=> 'L',
                'cek'=> 'kurang'
            ]);

            $user->assignRole('user');
            
            $userd = User::create([
                'username' => 123456780,
                'name'=>'Vicky Permata',
                'email' => 'Vicky.Permata@gmail.com',
                'password'=> bcrypt('12345678'),
                'email_verified_at' => now(),
                'no_handphone' => 62891829918299,
                'gender'=> 'P',
                'cek'=>'kurang'
            ]);

            $userd->assignRole('user');
            
    }
}
