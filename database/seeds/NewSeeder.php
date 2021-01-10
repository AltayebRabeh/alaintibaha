<?php

use App\Models\News;
use App\Models\Admin;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        News::create([
            'title' => $faker->title,
            'subject' => $faker->paragraph,
            'photos' => $faker->title,
            'admin_id' => Admin::find(1)->id,
        ]);
    }
}
