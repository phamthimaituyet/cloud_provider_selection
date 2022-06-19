<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            ['name' => 'Storage'],
            ['name' => 'Serverless'],
            ['name' => 'Databases'],
            ['name' => 'Networking & Content Delivery'],
            ['name' => 'Analytics'],
            ['name' => 'Compute'],
            ['name' => 'Developer Tools'],
            ['name' => 'Games'],
            ['name' => 'Migration & Transfer'],
            ['name' => 'Security, Identity, & Compliance'],
        ]);   
    }
}
