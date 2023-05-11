<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        for ($i = 20; $i < 30; $i++) {
            \DB::table('users') -> insert([
                'user_role_id' => rand(1, 4),
                'login_id' => rand(1, 17),
                'name' => 'Name'. $i,
                'address' => 'Address'. $i,
                'phone' => 'Phone'. $i,
                'email' => 'Phone'. $i

            ]);
        }
        // \DB::table('users') -> drop();
        // Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
