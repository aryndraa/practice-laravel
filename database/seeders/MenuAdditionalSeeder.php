<?php

namespace Database\Seeders;

use App\Models\MenuAdditional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuAdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuAdditional::factory(10)->create();
    }
}
