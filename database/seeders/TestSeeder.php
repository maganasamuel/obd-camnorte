<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $social = Social::factory()->create();
    }
}
