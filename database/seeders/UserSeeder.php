<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'login' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('P@ssw0rd'),
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::create([
            'login' => 'anonim',
            'email' => 'anonim@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        for ($i = 1; $i <= 6; $i++) {
            User::create([
                'login' => 'user'.$i,
                'email' => 'user'.$i.'@example.com',
                'password' => Hash::make('password'.$i),
                'role_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
