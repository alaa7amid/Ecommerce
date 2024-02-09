<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fname'=>'alaa',
            'lname'=>'hamid',
            'email'=>'alaa.hg.2000@gmail.com',
            'password'=>Hash::make('123456789'),
            'is_admin'=>1
        ]);
    }
}
