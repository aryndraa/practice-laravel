<?php

namespace Database\Seeders;

use App\Models\AdditionalVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdditionalVariant::factory(10)->create();
    }
}
