<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $teams = 7;

        for ($i = 0; $i < $teams; $i++) {
            $tid = random_int(0, 1000);
            $team = new \App\Team([
                'id' => $tid,
                'name' => sprintf('team-%s', $tid),
                'home_court' => sprintf('court-%s', $tid),
                'head_coach' => sprintf('coach-%s', $tid),
                'founding_year' => random_int(1970, 2000),
            ]);

            try {
                $team->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
