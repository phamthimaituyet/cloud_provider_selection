<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Storage', 'created_at' => new \DateTime()],
            ['name' => 'Serverless', 'created_at' => new \DateTime()],
            ['name' => 'Databases', 'created_at' => new \DateTime()],
            ['name' => 'Networking & Content Delivery', 'created_at' => new \DateTime()],
            ['name' => 'Analytics', 'created_at' => new \DateTime()],
            ['name' => 'Compute', 'created_at' => new \DateTime()],
            ['name' => 'Developer Tools', 'created_at' => new \DateTime()],
            ['name' => 'Games', 'created_at' => new \DateTime()],
            ['name' => 'Migration & Transfer', 'created_at' => new \DateTime()],
            ['name' => 'Security, Identity, & Compliance', 'created_at' => new \DateTime()],
        ]);   
    }
}
