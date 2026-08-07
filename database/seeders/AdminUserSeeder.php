<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('username', 'admin')->first();
        if (!$user) {
            User::create([
                'username' => 'admin',
                'password' => Hash::make('password'),
                'nama' => 'Administrator',
                'level' => 'admin',
            ]);
        }
    }
}
