<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            'Advertising and Marketing',
            'Aerospace',
            'Agriculture',
            'Computer and Technology',
            'Construction',
            'Education',
            'Energy',
            'Entertainment',
            'Fashion',
            'Finance and Economic',
            'Food and Beverage',
            'Healthcare',
            'Hospitality',
            'Manufacturing',
            'Media and News',
            'Mining',
            'Pharmaceutical',
            'Telecommunication',
            'Transportation',
        ];

        foreach ($industries as $industry) {
            Industry::create(['name' => $industry]);
        }
    }
}
