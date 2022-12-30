<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Blog\Seeders\HomePageSeeder;
use Laravel\Blog\Seeders\ContactPageSeeder;
use Laravel\Blog\Seeders\PrivacyPageSeeder;
use Laravel\Blog\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(HomePageSeeder::class);
        $this->call(ContactPageSeeder::class);
        $this->call(PrivacyPageSeeder::class);
        $this->call(UserSeeder::class);
    }
}
