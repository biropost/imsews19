<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamPerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        foreach (DB::table('teams')->select('id')->get() as $team) {
            $tp = new \App\TeamPerformance([
                'pts' => random_int(50, 150),
                'reb' => random_int(10, 100),
                'ast' => random_int(10, 100),
                'blocks' => random_int(10, 80),
                'tos' => random_int(10, 80),
                'fga' => random_int(20, 100),
                'fgm' => random_int(20, 100),
                'team_id' => $team->id,
            ]);

            try {
                $tp->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
