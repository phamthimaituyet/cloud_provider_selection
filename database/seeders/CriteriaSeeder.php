<?php

namespace Database\Seeders;

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
        \DB::table('criterias')->insert([
            ['id' => 1, 'name' => 'Agility', 'parent_id' => null], 
            ['id' => 2, 'name' => 'Risk', 'parent_id' => null], 
            ['id' => 3, 'name' => 'Security', 'parent_id' => null], 
            ['id' => 4, 'name' => 'Cost', 'parent_id' => null], 
            ['id' => 5, 'name' => 'Quality', 'parent_id' => null], 
            ['id' => 6, 'name' => 'Capability', 'parent_id' => null], 
            ['id' => 7, 'name' => 'Awareness/Visibility', 'parent_id' => null], 
            ['id' => 8, 'name' => 'Flexibility', 'parent_id' => 1], 
            ['id' => 9, 'name' => 'Adaptability', 'parent_id' => 1], 
            ['id' => 10, 'name' => 'Capacity/Elasticity', 'parent_id' => 1], 
            ['id' => 11, 'name' => 'Provider', 'parent_id' => 2], 
            ['id' => 12, 'name' => 'Compliance', 'parent_id' => 2], 
            ['id' => 13, 'name' => 'HR', 'parent_id' => 2], 
            ['id' => 14, 'name' => 'Physical & Environmental', 'parent_id' => 3], 
            ['id' => 15, 'name' => 'Communications & Operations', 'parent_id' => 3], 
            ['id' => 16, 'name' => 'Access Control', 'parent_id' => 3],
            ['id' => 17, 'name' => 'Data', 'parent_id' => 3],
            ['id' => 18, 'name' => 'Acquisition', 'parent_id' => 4],
            ['id' => 19, 'name' => 'On-Going', 'parent_id' => 4],
            ['id' => 20, 'name' => 'Serviceability', 'parent_id' => 5],
            ['id' => 21, 'name' => 'Availability', 'parent_id' => 5],
            ['id' => 22, 'name' => 'Functionality', 'parent_id' => 5],
            ['id' => 23, 'name' => 'Effectiveness', 'parent_id' => 5],
            ['id' => 24, 'name' => 'Function #1', 'parent_id' => 6],
            ['id' => 25, 'name' => 'Function #n', 'parent_id' => 6],
            ['id' => 26, 'name' => 'Portability', 'parent_id' => 8],
            ['id' => 27, 'name' => 'Replaceability', 'parent_id' => 8],
            ['id' => 28, 'name' => 'Business Stability', 'parent_id' => 11],
            ['id' => 29, 'name' => 'Certifications', 'parent_id' => 11], 
            ['id' => 30, 'name' => 'Contract/SLA Verfication', 'parent_id' => 11], 
            ['id' => 31, 'name' => 'Supply Chain', 'parent_id' => 11], 
            ['id' => 32, 'name' => 'Ethicality', 'parent_id' => 11], 
            ['id' => 33, 'name' => 'Auditability', 'parent_id' => 12], 
            ['id' => 34, 'name' => 'Policy', 'parent_id' => 17], 
            ['id' => 35, 'name' => 'Geographic/Political', 'parent_id' => 17], 
            ['id' => 36, 'name' => 'Ownership', 'parent_id' => 17], 
            ['id' => 37, 'name' => 'Privacy & Data Loss', 'parent_id' => 17], 
            ['id' => 38, 'name' => 'Integrity', 'parent_id' => 17], 
            ['id' => 39, 'name' => 'Maintainability', 'parent_id' => 20], 
            ['id' => 40, 'name' => 'Supportability', 'parent_id' => 20], 
            ['id' => 41, 'name' => 'Service Continuty', 'parent_id' => 20], 
            ['id' => 42, 'name' => 'Reliability', 'parent_id' => 21], 
            ['id' => 43, 'name' => 'Stability', 'parent_id' => 21], 
            ['id' => 44, 'name' => 'Resiliency/Fault Tolerance', 'parent_id' => 21], 
            ['id' => 45, 'name' => 'Suitability', 'parent_id' => 22], 
            ['id' => 46, 'name' => 'Accuracy', 'parent_id' => 22], 
            ['id' => 47, 'name' => 'Testacbility', 'parent_id' => 22], 
            ['id' => 48, 'name' => 'Interoperability', 'parent_id' => 22], 
            ['id' => 49, 'name' => 'Transparency', 'parent_id' => 22],
            ['id' => 50, 'name' => 'Value', 'parent_id' => 23],
            ['id' => 51, 'name' => 'Efficiency', 'parent_id' => 23],
            ['id' => 52, 'name' => 'Usability', 'parent_id' => 23],
            ['id' => 53, 'name' => 'Contracting Experience', 'parent_id' => 23],
            ['id' => 54, 'name' => 'Retention/Disposition', 'parent_id' => 34],
            ['id' => 55, 'name' => 'Accounttability', 'parent_id' => 34],
            ['id' => 56, 'name' => 'Recoverability', 'parent_id' => 44],
            ['id' => 57, 'name' => 'Analyzability/Root Cause Analysis', 'parent_id' => 44],
            ['id' => 58, 'name' => 'Service Response Time', 'parent_id' => 51],
            ['id' => 59, 'name' => 'Sustainability', 'parent_id' => 51],
            ['id' => 60, 'name' => 'Installability', 'parent_id' => 52],
            ['id' => 61, 'name' => 'Learnability', 'parent_id' => 52],
            ['id' => 62, 'name' => 'Operability', 'parent_id' => 52],
            ['id' => 63, 'name' => 'Undertandability', 'parent_id' => 52],
            ['id' => 64, 'name' => 'Function #1', 'parent_id' => 58],
            ['id' => 65, 'name' => 'Function #n', 'parent_id' => 58],
        ]);
    }
}
