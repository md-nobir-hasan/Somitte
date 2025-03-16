<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User role seeder
        Artisan::call('shield:generate --all --panel="admin"');

        DB::table('roles')->insert([
            'name' => 'user',
            'guard_name' => 'web',
        ]);

         // সুপার অ্যাডমিন ইউজার তৈরি করা
        $superAdmin = User::create([
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
            // 'role_id' => 1,
            'designation' => 'Student',
            'department' => 'ASVM',
        ]);
        $superAdmin->assignRole('super_admin'); // রোল অ্যাসাইন করা

        // সাধারণ ইউজার তৈরি করা
        $user = User::create([
            'name' => 'User',
                'batch' => '22',
                'permanent_address' => 'Dhaka',
                'present_address' => 'Dhaka',
                'occupation' => 'Student',
                'occupation_sector' => 'Student',
                'photo' => '/asset/images/default/profile.webp',
                'phone' => '01717171717',
                'whatsapp' => '01717171717',
                'email' => 'user@gmail.com',
                'password' => Hash::make('1111'),
                // 'role_id' => 2,
                'designation' => 'Student',
                'department' => 'ASVM',
        ]);
        $user->assignRole('user');
    }
}
