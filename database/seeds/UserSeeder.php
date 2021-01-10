<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "test",
            'email' => "test@test.com",
            'photo' => '',
            'email_verified_at' => now(),
            'password' => bcrypt('test123'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
