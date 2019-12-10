<?php

use Illuminate\Database\Seeder;
use App\Fixture;
class FixtureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('fixtures')->truncate();
        // for ($i = 1; $i >= 25; $i++) {
            Fixture::create([
                'home' => 1,
                'away' => 2,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 3,
                'away' => 4,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 5,
                'away' => 6,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 7,
                'away' => 8,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 9,
                'away' => 10,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);
            Fixture::create([
                'home' => 11,
                'away' => 12,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 13,
                'away' => 14,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 15,
                'away' => 16,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 17,
                'away' => 18,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);

            Fixture::create([
                'home' => 19,
                'away' => 20,
                'fixture_date' => now(),
                'fixture_time' => date('h:i:s'),
            ]);
        // }

    }
}