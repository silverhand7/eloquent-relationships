<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(15)->create();
        Book::factory(20)->create();

        $authors = Author::all();
        foreach ($authors as $author) {
            $author->books()->syncWithPivotValues(Book::inRandomOrder()->limit(rand(0, 3))->get()->pluck('id')->all(), [
                'role' => rand(1, 2)
            ]);
        }
    }
}
