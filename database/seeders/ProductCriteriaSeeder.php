<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){
            DB::table('product_criterias')->insert([
                ['criteria_id' => rand(1, 65), 'product_id' => rand(1, 3), 'value' => rand(1, 10), 'created_at' => new \DateTime(), 'updated_at' => new \DateTime()],
            ]);   
        }
    }
}
