<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $from = Carbon::parse('2024-08-01');

        $to = Carbon::parse('2025-08-31');

        // $date = now();

        // $date = Carbon::parse('2024-07-01');

        // $date = Carbon::parse('2024-09-01');

        // echo now()->between($from, $to) ? 'yes' : 'no';

        // echo $from->isPast() ? 'is past' : 'not past';

        // echo $from->diffForHumans($to);

        $ad = Ad::factory()->create();

        dd($ad->toArray());
    }
}
