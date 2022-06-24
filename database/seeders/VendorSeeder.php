<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('vendors')->insert([
            ['name' => 'Amazon Web Services', 'address' => '1900 University Ave', 'created_at' => new \DateTime()],
            ['name' => 'Microsoft Azure','address' => '1 Microsoft Way', 'created_at' => new \DateTime()],
            ['name' => 'Google Cloud Platform', 'address' => 'Hoa Kỳ', 'created_at' => new \DateTime()],
            ['name' => 'IBM Cloud', 'address' => 'IBM Vietnam Company 2nd Floor, Pacific Place 83B Ly Thuong Kiet Hanoi, Vietnam', 'created_at' => new \DateTime()],
            ['name' => 'Oracle Cloud Infrastructure', 'address' => 'Oracle University', 'created_at' => new \DateTime()],
            ['name' => 'CloudLinux', 'address' => 'Mỹ', 'created_at' => new \DateTime()],
        ]);   
    }
}
