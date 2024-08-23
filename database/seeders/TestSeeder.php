<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::truncate();
        Ad::factory()->count(10)->create();
        Ad::factory()->count(10)->dormant()->create();
        Ad::factory()->count(10)->expired()->create();
        Ad::factory()->count(10)->inactive()->create();
    }
}
