<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class CitySlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::where('province_id', config('options.province.id'))->first()
            ->cities()
            ->each(fn ($city) => $city->update(['slug' => str($city->name)->slug()]));
    }
}
