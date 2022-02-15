<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        User::create([
            'name' => 'Fabrizio Fasanando',
            'email' => 'fabrizio@laravel.com',
            'password' => bcrypt('root')
        ]);

        Post::factory()->count(24)->create();
    }
}
