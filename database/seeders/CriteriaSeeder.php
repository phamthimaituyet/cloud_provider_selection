<?php 

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criterias')->insert([
            ['id' => 1, 'weight' => '', 'name' => 'Agility', 'parent_id' => null], 
            ['id' => 2, 'weight' => '', 'name' => 'Risk', 'parent_id' => null], 
            ['id' => 3, 'weight' => '', 'name' => 'Security', 'parent_id' => null], 
            ['id' => 4, 'weight' => '0.011', 'name' => 'Cost', 'parent_id' => null], 
            ['id' => 5, 'weight' => '', 'name' => 'Quality', 'parent_id' => null], 
            ['id' => 6, 'weight' => '0.009', 'name' => 'Capability', 'parent_id' => null], 
            ['id' => 7, 'weight' => '0.009', 'name' => 'Awareness/Visibility', 'parent_id' => 1], 
            ['id' => 8, 'weight' => '0.014', 'name' => 'Flexibility', 'parent_id' => 1], 
            ['id' => 9, 'weight' => '0.008', 'name' => 'Adaptability', 'parent_id' => 1], 
            ['id' => 10, 'weight' => '0.044', 'name' => 'Capacity/Elasticity', 'parent_id' => 1], 
            ['id' => 11, 'weight' => '0.067', 'name' => 'Provider', 'parent_id' => 2], 
            ['id' => 12, 'weight' => '0.02', 'name' => 'Compliance', 'parent_id' => 2], 
            ['id' => 13, 'weight' => '0.004', 'name' => 'HR', 'parent_id' => 2], 
            ['id' => 14, 'weight' => '0.044', 'name' => 'Physical & Environmental', 'parent_id' => 3], 
            ['id' => 15, 'weight' => '0.044', 'name' => 'Communications & Operations', 'parent_id' => 3], 
            ['id' => 16, 'weight' => '0.044', 'name' => 'Access Control', 'parent_id' => 3],
            ['id' => 17, 'weight' => '0.268', 'name' => 'Data', 'parent_id' => 3],
            ['id' => 18, 'weight' => '', 'name' => 'Acquisition', 'parent_id' => 4],
            ['id' => 19, 'weight' => '', 'name' => 'On-Going', 'parent_id' => 4],
            ['id' => 20, 'weight' => '0.085', 'name' => 'Serviceability', 'parent_id' => 5],
            ['id' => 21, 'weight' => '0.135', 'name' => 'Availability', 'parent_id' => 5],
            ['id' => 22, 'weight' => '0.076', 'name' => 'Functionality', 'parent_id' => 5],
            ['id' => 23, 'weight' => '0.119', 'name' => 'Effectiveness', 'parent_id' => 5],
            ['id' => 24, 'weight' => '', 'name' => 'Function #1', 'parent_id' => 6],
            ['id' => 25, 'weight' => '', 'name' => 'Function #n', 'parent_id' => 6],
            ['id' => 26, 'weight' => '', 'name' => 'Portability', 'parent_id' => 8],
            ['id' => 27, 'weight' => '', 'name' => 'Replaceability', 'parent_id' => 8],
            ['id' => 28, 'weight' => '', 'name' => 'Business Stability', 'parent_id' => 11],
            ['id' => 29, 'weight' => '', 'name' => 'Certifications', 'parent_id' => 11], 
            ['id' => 30, 'weight' => '', 'name' => 'Contract/SLA Verfication', 'parent_id' => 11], 
            ['id' => 31, 'weight' => '', 'name' => 'Supply Chain', 'parent_id' => 11], 
            ['id' => 32, 'weight' => '', 'name' => 'Ethicality', 'parent_id' => 11], 
            ['id' => 33, 'weight' => '', 'name' => 'Auditability', 'parent_id' => 12], 
            ['id' => 34, 'weight' => '', 'name' => 'Policy', 'parent_id' => 17], 
            ['id' => 35, 'weight' => '', 'name' => 'Geographic/Political', 'parent_id' => 17], 
            ['id' => 36, 'weight' => '', 'name' => 'Ownership', 'parent_id' => 17], 
            ['id' => 37, 'weight' => '', 'name' => 'Privacy & Data Loss', 'parent_id' => 17], 
            ['id' => 38, 'weight' => '', 'name' => 'Integrity', 'parent_id' => 17], 
            ['id' => 39, 'weight' => '', 'name' => 'Maintainability', 'parent_id' => 20], 
            ['id' => 40, 'weight' => '', 'name' => 'Supportability', 'parent_id' => 20], 
            ['id' => 41, 'weight' => '', 'name' => 'Service Continuty', 'parent_id' => 20], 
            ['id' => 42, 'weight' => '', 'name' => 'Reliability', 'parent_id' => 21], 
            ['id' => 43, 'weight' => '', 'name' => 'Stability', 'parent_id' => 21], 
            ['id' => 44, 'weight' => '', 'name' => 'Resiliency/Fault Tolerance', 'parent_id' => 21], 
            ['id' => 45, 'weight' => '', 'name' => 'Suitability', 'parent_id' => 22], 
            ['id' => 46, 'weight' => '', 'name' => 'Accuracy', 'parent_id' => 22], 
            ['id' => 47, 'weight' => '', 'name' => 'Testacbility', 'parent_id' => 22], 
            ['id' => 48, 'weight' => '', 'name' => 'Interoperability', 'parent_id' => 22], 
            ['id' => 49, 'weight' => '', 'name' => 'Transparency', 'parent_id' => 22],
            ['id' => 50, 'weight' => '', 'name' => 'Value', 'parent_id' => 23],
            ['id' => 51, 'weight' => '', 'name' => 'Efficiency', 'parent_id' => 23],
            ['id' => 52, 'weight' => '', 'name' => 'Usability', 'parent_id' => 23],
            ['id' => 53, 'weight' => '', 'name' => 'Contracting Experience', 'parent_id' => 23],
            ['id' => 54, 'weight' => '', 'name' => 'Retention/Disposition', 'parent_id' => 34],
            ['id' => 55, 'weight' => '', 'name' => 'Accounttability', 'parent_id' => 34],
            ['id' => 56, 'weight' => '', 'name' => 'Recoverability', 'parent_id' => 44],
            ['id' => 57, 'weight' => '', 'name' => 'Analyzability/Root Cause Analysis', 'parent_id' => 44],
            ['id' => 58, 'weight' => '', 'name' => 'Service Response Time', 'parent_id' => 51],
            ['id' => 59, 'weight' => '', 'name' => 'Sustainability', 'parent_id' => 51],
            ['id' => 60, 'weight' => '', 'name' => 'Installability', 'parent_id' => 52],
            ['id' => 61, 'weight' => '', 'name' => 'Learnability', 'parent_id' => 52],
            ['id' => 62, 'weight' => '', 'name' => 'Operability', 'parent_id' => 52],
            ['id' => 63, 'weight' => '', 'name' => 'Undertandability', 'parent_id' => 52],
            ['id' => 64, 'weight' => '', 'name' => 'Function #1', 'parent_id' => 58],
            ['id' => 65, 'weight' => '', 'name' => 'Function #n', 'parent_id' => 58],
        ]);
    }
}
