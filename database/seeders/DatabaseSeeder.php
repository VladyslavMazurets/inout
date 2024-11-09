<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $authors = Author::factory(6)->create();
        $instructors = Instructor::factory(6)->create();

        Post::factory(10)->create()->each(function ($post) use ($authors) {
            $post->authors()->attach($authors->random(3)->pluck('id'));
        });

        Course::factory(10)->create()->each(function ($course) use ($instructors) {
            $course->instructors()->attach($instructors->random(3)->pluck('id'));
        });
    }
}
