<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Post::truncate();

        for( $i = 0; $i < 20; $i++) {

        $title = $faker->sentence;
        $slug = Str::slug($title);
        
            post::create([
                'author_id' => App\User::all()->random()->id,
                'title' => $title,
                'slug' => $slug,
                'excerpt' => $faker->paragraph(3),
                'body' => $faker->paragraph(50),
                'image' => 'http://placehold.it/787x392'
            ]);
        }
    }
}
