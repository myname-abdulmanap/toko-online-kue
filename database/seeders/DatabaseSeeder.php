<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the AdminSeeder to seed the admin user
        $this->call(AdminSeeder::class);

        // You can add more seeders here if needed
        // $this->call(OtherSeeder::class);
    }
}
