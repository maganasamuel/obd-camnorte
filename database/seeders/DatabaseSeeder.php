<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Yajra\Address\Seeders\AddressSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => app()->isProduction()
                ? str(config('mail.from.address'))->after('@')->prepend('admin@')
                : 'admin@mail.com',
        ]);

        $this->call([AddressSeeder::class, CitySlugSeeder::class]);
    }
}
