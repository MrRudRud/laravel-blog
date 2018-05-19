<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::enableForeignKeyConstraints();
        Schema::disableForeignKeyConstraints();
        $faker = Factory::create();
        Post::truncate();
        $date = Carbon::create(2018, 5, 2, 9);

        for( $i = 0; $i < 15; $i++) {

            $image = "Post_Image_" . rand(1, 5) . ".jpg";
            $title = $faker->sentence;
            $slug = Str::slug($title);
            $date->addDays(1);
            $publishedDate = clone($date);
            $createDate = clone($date);
            // $date = date("Y-m-d H:i:s", strtotime("2018-05-01 06:00:00 + {$i} days"))
            
            post::create([
                'author_id' => App\User::all()->random()->id,
                'title' => $title,
                'slug' => $slug,
                'excerpt' => $faker->paragraph(10),
                'body' => $faker->paragraph(100),
                'image' => rand(0, 1) == 1 ? $image : NULL,
                'created_at' => $createDate,
                'updated_at' => $createDate,
                'published_at' => $i < 2 ? $publishedDate : rand(0, 1) == 0 ? NULL : $publishedDate->addDays(8),
            ]);
        }
    }
}
