<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\PropertySeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\ApplicationSeeder;
use Database\Seeders\PropertyCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ApplicationSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PropertyCategorySeeder::class);
        $this->call(PropertySeeder::class);
    }
}