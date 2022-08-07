<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Cloud Manager - Manual Installation without access keys',
                'description' => "This listing lets you manually launch a Cloud Manager instance without providing your AWS credentials. After launching the Cloud Manager software in AWS, you can access it by entering the instance's IP address in a web browser. \n If you subscribe here, you still need to subscribe on the listing below for PAYGO charges.",
                'support' => "Cloud Manager - Manual Installation without access keys. Software support for NetApp Cloud Manager is provided as part of Cloud Volumes ONTAP for AWS support.  With the purchase of Cloud Volumes ONTAP Hourly or BYOL platforms, you will get support for your Cloud Manager software. NetApp has extensive self-support options that are available 24x7. NetApp customers can also get support from our tech support team via chat, web tickets or phone. 
                            Support Portal:  https://mysupport.netapp.com  Community and Forums:  http://community.netapp.com/hybrid-cloud 
                            AWS Infrastructure
                            AWS Support is a one-on-one support channel that is staffed 24x7x365 with experienced support engineers. AWS Support offers four support plans: Basic, Developer, Business, and Enterprise. The Basic plan is free of charge and offers support for account and billing questions and service limit increases. The other plans offer an unlimited number of technical support cases with pay-by-the-month pricing and no long term contracts, providing the level of support that meets your needs",
                            
                'vendor_id' => 1,
                'category_id' => 1,
            ],
            [
                'name' => 'N2WS Backup & Recovery for AWS Free Trial/BYOL',
                'description' => "N2WS Backup & Recovery (CPM) provides a single dashboard to centralize and automate AWS backup for EC2 , database backup and recovery. N2WS makes use of native snapshot technology to fully automate backup of Amazon EC2, EBS, RDS, Redshift, Aurora, EFS, Dynamo DB and S3 - with 1 click Disaster Recovery (DR).
                                Streamline AWS backup and recovery with an easy-to-use interface with real-time alerts, comprehensive reporting and multi-tenancy for large environments.
                                Gain peace of mind with automated backup policies and schedules and recover a single file or full instance in less than 30 seconds.
                                Minimize downtime by enabling cross-region and cross-account Disaster Recovery (DR) and Amazon VPC backup (with ability to restore at a moment's notice).
                                Stay on top of cloud costs with automated resource scheduling and monitor EBS policy spend from the N2WS dashboard.",
                'support' => "AWS Infrastructure
                            AWS Support is a one-on-one support channel that is staffed 24x7x365 with experienced support engineers. AWS Support offers four support plans: Basic, Developer, Business, and Enterprise. The Basic plan is free of charge and offers support for account and billing questions and service limit increases. The other plans offer an unlimited number of technical support cases with pay-by-the-month pricing and no long term contracts, providing the level of support that meets your needs.",
                'vendor_id' => 1,
                'category_id' => 1,
            ],
            [
                'name' => 'Veeam Backup for AWS FREE Trial & BYOL Edition',
                'description' => "N2WS Backup & Recovery (CPM) provides a single dashboard to centralize and automate AWS backup for EC2 backup, database backup, recovery and DR. N2WS makes use of native snapshot technology to fully automate backup of Amazon EC2, EBS, RDS, Redshift, Aurora, EFS, FSx, Dynamo DB and S3 - with 1 click Disaster Recovery (DR).
                                Streamline AWS backup and recovery with an easy-to-use interface with real-time alerts, comprehensive reporting and multi-tenancy for large environments. 
                                Gain peace of mind with automated backup policies and schedules and recover a single file or full instance in less than 30 seconds.
                                Minimize downtime and protect against ransomware by enabling cross-region and cross-account backup and Disaster Recovery (DR) and Amazon VPC backup (with ability to restore at a moment's notice).
                                Stay on top of cloud backup costs with automated resource scheduling, automate backup to low-cost Amazon S3 for long-term retention and compliance and monitor EBS policy spend from the N2WS dashboard.",
                'support' => "AWS Infrastructure
                            AWS Support is a one-on-one support channel that is staffed 24x7x365 with experienced support engineers. AWS Support offers four support plans: Basic, Developer, Business, and Enterprise. The Basic plan is free of charge and offers support for account and billing questions and service limit increases. The other plans offer an unlimited number of technical support cases with pay-by-the-month pricing and no long term contracts, providing the level of support that meets your needs.",
                'vendor_id' => 1,
                'category_id' => 1,
            ],
            [
                'name' => 'Azure Backup',
                'description' => 'zure Backup is a cost-effective, secure, one-click backup solution that’s scalable based on your backup storage needs. The centralized management interface makes it easy to define backup policies and protect a wide range of enterprise workloads, including Azure Virtual Machines, SQL and SAP databases, and Azure file shares.',
                'support' => 'You can use Azure Backup to back up data to the Microsoft Azure cloud platform. This article summarizes the general support settings and limitations for Azure Backup scenarios and deployments.',
                'vendor_id' => 2,
                'category_id' => 1,
            ],
            [
                'name' => 'Azure Disk Storage',
                'description' => 'Designed to be used with Azure Virtual Machines and Azure VMware Solution (in preview), Azure Disk Storage offers high-performance, durable block storage for your mission- and business-critical applications. Confidently migrate to Azure infrastructure with four disk storage options for the cloud—–Ultra Disk Storage, Premium SSD, Standard SSD, and Standard HDD—to optimize costs and performance for your workload. Get high performance with sub-millisecond latency for throughput and transaction-intensive workloads such as SAP HANA, SQL Server, and Oracle.',
                'support' => '',
                'vendor_id' => 2,
                'category_id' => 1,
            ],
            [
                'name' => 'Red Hat Enterprise Linux 8.4 with High Availability',
                'description' => 'The Red Hat Enterprise Linux with High Availability image is the foundation to a clustered system that provides reliability, scalability, and availability to critical production services. A cluster is two or more instances (called nodes or members) that work together to perform a task.',
                'support' => 'Red Hat Enterprise Linux 8.4 with High Availability
                Support is available through forums, technical FAQs and the Service Help Dashboard.  Paid support is available.
                https://forums.aws.amazon.com/forum.jspa?forumID=30 https://aws.amazon.com/premiumsupport/',
                'vendor_id' => 1,
                'category_id' => 7,
            ],
            [
                'name' => 'Amazon DynamoDB',
                'description' => 'Amazon DynamoDB is a fully managed, serverless, key-value NoSQL database designed to run high-performance applications at any scale. DynamoDB offers built-in security, continuous backups, automated multi-Region replication, in-memory caching, and data export tools.',
                'support' => '',
                'vendor_id' => 1,
                'category_id' => 2,
            ],
            [
                'name' => 'Amazon MemoryDB for Redis',
                'description' => 'Redis-compatible, durable, in-memory database service for ultra-fast performance',
                'support' => '',
                'vendor_id' => 1,
                'category_id' => 2,
            ],
        ]);   
    }
}
