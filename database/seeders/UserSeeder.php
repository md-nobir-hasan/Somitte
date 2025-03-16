<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role Seeder
        $role = [
            [
                'name' => 'Admin',
                'guard_name' => 'web',
            ],
        ];

        DB::table('roles')->insert($role);


        // User Seeder
        $data = [
            [
                'name' => 'Admin',
                'batch' => '20',
                'permanent_address' => 'Dhaka',
                'present_address' => 'Dhaka',
                'occupation' => 'Student',
                'occupation_sector' => 'Student',
                'photo' => '/asset/images/default/profile.webp',
                'phone' => '01717171717',
                'whatsapp' => '01717171717',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1111'),
                'role_id' => 1,
                'designation' => 'Student',
                'department' => 'ASVM',
            ],
        ];

        DB::table('users')->insert($data);
    }
}
