<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mai Tuyết',
            'email' => 'maituyet00@gmail.com',
            'role' => '1',                      // role 1 :admin , role 2 :user
            'password' => Hash::make('123456'),
        ]);
        User::factory()->count(50)->create();
    }
}
