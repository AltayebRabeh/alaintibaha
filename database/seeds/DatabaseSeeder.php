<?php

<<<<<<< HEAD
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run () {
        $this->call(AdminSeeder::class);
=======
namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
        ]);
>>>>>>> 8b7377ed014879e91e418f6e7da1899898743bed
    }
}
