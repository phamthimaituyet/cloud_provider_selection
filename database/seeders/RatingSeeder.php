<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            $user_ids = [];
            for ($j = 1; $j <= 7; $j++) {
                do {
                    $user_id = rand(1, 52);
                } while (in_array($user_id, $user_ids));
                $user_ids[] = $user_id;
                DB::table('ratings')->insert([
                    'user_id' => $user_id,
                    'product_id' => $i,
                    'number_star' => rand(3, 5),                      // role 1 :admin , role 2 :user
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime()
                ]);
            }
        }
    }
}
