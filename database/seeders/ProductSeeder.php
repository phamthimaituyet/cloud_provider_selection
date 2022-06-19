<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            [
                'name' => 'Cloud Manager - Manual Installation without access keys',
                'description' => "This listing lets you manually launch a Cloud Manager instance without providing your AWS credentials. After launching the Cloud Manager software in AWS, you can access it by entering the instance's IP address in a web browser. If you subscribe here, you still need to subscribe on the listing below for PAYGO charges.",
                'support' => "Cloud Manager - Manual Installation without access keys. Software support for NetApp Cloud Manager is provided as part of Cloud Volumes ONTAP for AWS support.  With the purchase of Cloud Volumes ONTAP Hourly or BYOL platforms, you will get support for your Cloud Manager software. NetApp has extensive self-support options that are available 24x7. NetApp customers can also get support from our tech support team via chat, web tickets or phone. Support Portal:  https://mysupport.netapp.com  Community and Forums:  http://community.netapp.com/hybrid-cloud",
                'price_id' => 1,
                'vendor_id' => 1,
                'category_id' => 1,
                'criteria_id' => 1,
            ],
            [
                'name' => 'N2WS Backup & Recovery for AWS Free Trial/BYOL',
                'description' => "This listing lets you manually launch a Cloud Manager instance without providing your AWS credentials. After launching the Cloud Manager software in AWS, you can access it by entering the instance's IP address in a web browser. If you subscribe here, you still need to subscribe on the listing below for PAYGO charges.",
                'support' => "Cloud Manager - Manual Installation without access keys. Software support for NetApp Cloud Manager is provided as part of Cloud Volumes ONTAP for AWS support.  With the purchase of Cloud Volumes ONTAP Hourly or BYOL platforms, you will get support for your Cloud Manager software. NetApp has extensive self-support options that are available 24x7. NetApp customers can also get support from our tech support team via chat, web tickets or phone. Support Portal:  https://mysupport.netapp.com  Community and Forums:  http://community.netapp.com/hybrid-cloud",
                'price_id' => 1,
                'vendor_id' => 1,
                'category_id' => 1,
                'criteria_id' => 1,
            ],
            [
                'name' => 'Veeam Backup for AWS FREE Trial & BYOL Edition',
                'description' => "This listing lets you manually launch a Cloud Manager instance without providing your AWS credentials. After launching the Cloud Manager software in AWS, you can access it by entering the instance's IP address in a web browser. If you subscribe here, you still need to subscribe on the listing below for PAYGO charges.",
                'support' => "Cloud Manager - Manual Installation without access keys. Software support for NetApp Cloud Manager is provided as part of Cloud Volumes ONTAP for AWS support.  With the purchase of Cloud Volumes ONTAP Hourly or BYOL platforms, you will get support for your Cloud Manager software. NetApp has extensive self-support options that are available 24x7. NetApp customers can also get support from our tech support team via chat, web tickets or phone. Support Portal:  https://mysupport.netapp.com  Community and Forums:  http://community.netapp.com/hybrid-cloud",
                'price_id' => 1,
                'vendor_id' => 1,
                'category_id' => 1,
                'criteria_id' => 1,
            ],
        ]);   
    }
}
