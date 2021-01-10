<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run () {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            NewSeeder::class,
            CommentSeeder::class, 
        ]);
    }
}
