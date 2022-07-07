<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            ['type' => 'small', 'date_use' => 30, 'price' => 11.32, 'product_id' => 1, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'large', 'date_use' => 30, 'price' => 13.00, 'product_id' => 1, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'small', 'date_use' => 30, 'price' => 10.01, 'product_id' => 2, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'large', 'date_use' => 30, 'price' => 20.25, 'product_id' => 2, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'xlarge', 'date_use' => 30, 'price' => 9.43, 'product_id' => 2, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'small', 'date_use' => 60, 'price' => 11.02, 'product_id' => 3, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'large', 'date_use' => 60, 'price' => 12.34, 'product_id' => 3, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => '4GiB', 'date_use' => 60, 'price' => 1.01, 'product_id' => 5, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => '16GiB', 'date_use' => 60, 'price' => 2.02, 'product_id' => 5, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => '25MB/second', 'date_use' => 60, 'price' => 0.06, 'product_id' => 5, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'Instance < 50GB', 'date_use' => 60, 'price' => 10, 'product_id' => 4, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ['type' => 'Instance > 50GB', 'date_use' => 60, 'price' => 20, 'product_id' => 4, 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            
        ]);
    }
}
