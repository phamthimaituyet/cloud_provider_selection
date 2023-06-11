<?php

namespace Database\Seeders;

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
        // $this->call(UserSeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(RatingSeeder::class);
        // $this->call(CategorySeeder::class);
        $this->call(VendorSeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(PriceSeeder::class);
        // $this->call(CriteriaSeeder::class);
    }
}
