<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$password = 'password123';
$user = \App\Models\User::create([
    'nama' => 'Test User',
    'username' => 'testuser123',
    'password' => \Illuminate\Support\Facades\Hash::make($password),
    'level' => 'Member',
]);

echo "Created User: " . $user->username . "\n";
$credentials = ['username' => 'testuser123', 'password' => $password];
echo Auth::attempt($credentials) ? 'Login Success' : 'Login Failed';
