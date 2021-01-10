<?php

use App\Models\News;
use App\Models\User;
use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Comment::create([
            'comment' => $faker->title,
            'photos' => $faker->title,
            'status' => 1,
            'new_id' => News::find(1)->id,
            'user_id' => User::find(1)->id,
        ]);
    }
}
