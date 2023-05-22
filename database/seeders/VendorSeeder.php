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
                'description' => 'Amazon.com Inc (Amazon) is an online retailer and web service provider. The company provides products such as apparel, auto and industrial items, beauty and health products, electronics, grocery, games, jewelry, kids and baby products, music, sports goods, toys, and tools. It also offers related support services including home delivery and shipping, cloud web hosting and other web related services. Amazon merchandises these products through company-owned online and physical platforms',
                'address' => 'United States of America', 
                'phone' => '12 06266 1000',
                'year' => 1994,
                'link' => 'https://aws.amazon.com/marketplace', 
                'img_url' => 'storage/images/amazon.jpg',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'Microsoft Azure',
                'description' => 'Microsoft Azure is a global cloud computing platform providing compute, storage, data, and networking services to customers. The Microsoft Azure platform is stretched across 19 markets throughout the world and supports 10 languages and 19 different currencies. Microsoft has committed to delivering all new data centers at an industry low 1.125 PUE, ensuring efficient infrastructure for its users.',
                'phone' => '',
                'address' => 'United States', 
                'year' => 2010,
                'link' => 'https://azure.microsoft.com/en-us/pricing/', 
                'img_url' => 'storage/images/azure-synapse-analytics/YF6fSgtvvEKtz0Tt0drWZejjiypt1hDELlARJ3Y8.png',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'Google Cloud Platform', 
                'description' => 'Google Cloud Platform is a cloud computing platform provided by Google, with virtual machine services, storage, data analysis, and many other advanced technologies. Google Cloud is supported, strengthened and innovated by an infrastructure of Google products.Google Cloud has expanded seven products, each with more than a billion users, each day processing 1.4 petabytes of information.',
                'address' => 'Hoa Kỳ', 
                'phone' => '',
                'year' => NULL,
                'link' => 'https://cloud.google.com/marketplace', 
                'img_url' => 'storage/images/alloydb-for-postgresql/Wjn0WheS7dQ62AQMb1U7Smyu9OTQgTIn0HRhRzD3.jpg',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'IBM Cloud',
                'description' => 'This service provider operates a diverse, complex and extensive network that supports many different types of user communities. Their diverse interactions and behaviors are difficult to baseline as “normal” for network activity.',
                'address' => 'United States of America',
                'year' => 2017,
                'phone' => '',
                'link' => 'https://www.ibm.com/cloud/products',
                'img_url' => 'storage/images/IBM.jpg',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'Oracle Cloud Infrastructure', 
                'description' => 'With more than 380,000 customers—including 100 of the Fortune 100—and with deployments across a wide variety of industries in more than 145 countries around the globe, Oracle offers an optimized and fully integrated stack of business hardware and software systems',
                'address' => 'Redwood City, CA, United States', 
                'phone' => '18006-722531',
                'year' => 1977,
                'link' => 'https://www.oracle.com/cloud/marketplace/',
                'img_url' => 'storage/images/oracle-cloud-infrastructure/w7F4ldoapyM9ECL08f7ud1hDwhBTt5n6iK97qjDT.png',
                'created_at' => new \DateTime()
            ],
            [
                'name' => 'CloudLinux',
                'description' => 'CloudLinux is a powerful and feature-packed operating system built upon CentOS – an open source operating system. Take a look at this CloudLinux overview to learn more about CloudLinux benifits.', 
                'address' => 'Canada',
                'phone' => '',
                'year' => NULL,
                'link' => 'https://www.cloudlinux.com/partners/',
                'img_url' => 'storage/images/cloudLinux.jpg',
                'created_at' => new \DateTime()
            ],
        ]);   
    }
}
