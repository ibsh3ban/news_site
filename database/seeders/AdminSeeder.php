<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['id' => '1', 'email' => 'ibra@test.com', 'password' => '123456', 'created_at' => now(), 'updated_at' => now()]);

    }
}
