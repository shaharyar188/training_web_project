<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            'user_name' => "Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt(123123123),
            "Is_admin" => 1,
            "Is_active" => 1,
        ]);
    }
}
