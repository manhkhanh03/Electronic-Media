<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        for ($i = 0; $i < 100; $i++) {
            \DB::table('likes') -> insert([
                'user_id' => rand(1, 17),
                'article_id' => rand(1, 7)
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
