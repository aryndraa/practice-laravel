<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Variant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MenuSeeder::class,
            VariantSeeder::class,
            AdditionalSeeder::class,
            MenuAdditionalSeeder::class,
            AdditionalVariantSeeder::class,
        ]);
    }
}
