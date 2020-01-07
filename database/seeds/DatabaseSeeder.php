<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeamSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(PlayerSeeder::class);
        $this->call(RefereeSeeder::class);
        $this->call(TeamPerformanceSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(TeamsPlayGamesSeeder::class);
    }
}
