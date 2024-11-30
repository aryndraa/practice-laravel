<?php

namespace Database\Seeders;

use App\Models\Additional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Additional::factory(10)->create();
    }
}
