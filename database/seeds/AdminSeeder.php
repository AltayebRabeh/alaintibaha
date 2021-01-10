<?php

use App\Models\Admin;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 8b7377ed014879e91e418f6e7da1899898743bed
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
<<<<<<< HEAD
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
=======
            'name' => "admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // password
>>>>>>> 8b7377ed014879e91e418f6e7da1899898743bed
            'remember_token' => Str::random(10),
        ]);
    }
}
