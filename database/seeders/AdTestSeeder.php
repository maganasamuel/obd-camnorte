<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AdTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::all()->each(function ($ad) {
            $ad->delete();
        });

        Ad::truncate();

        Media::truncate();

        $disk = Storage::disk('public');

        $brandLogos = $disk->files('ads');

        foreach ($brandLogos as $brandLogo) {
            $ad = Ad::factory()->create([
                'name' => str($brandLogo)->replace('ads/', '')->upper()->value(),
            ]);

            $ad->addMedia($disk->path($brandLogo))
                ->preservingOriginal()
                ->toMediaCollection('ads');
        }
    }
}
