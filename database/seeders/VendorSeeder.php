<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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
        DB::table('vendors')->insert([
            [
                'name' => 'Amazon Web Services', 
                'address' => '1900 University Ave', 
                'link' => 'https://aws.amazon.com/marketplace', 
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'Microsoft Azure',
                'address' => '1 Microsoft Way', 
                'link' => 'https://azure.microsoft.com/en-us/pricing/', 
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'Google Cloud Platform', 
                'address' => 'Hoa Kỳ', 
                'link' => 'https://cloud.google.com/marketplace', 
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'IBM Cloud',
                'address' => 'IBM Vietnam Company 2nd Floor, Pacific Place 83B Ly Thuong Kiet Hanoi, Vietnam',
                'link' => 'https://www.ibm.com/cloud/products',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'Oracle Cloud Infrastructure', 
                'address' => 'Oracle University', 
                'link' => 'https://www.oracle.com/cloud/marketplace/',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'CloudLinux', 
                'address' => 'Mỹ',
                'link' => 'https://www.cloudlinux.com/partners/',
                'created_at' => new \DateTime()
            ],
        ]);   
    }
}
