<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $referees = DB::table('referees')->select('id')->get();
        $performances = DB::table('team_performances')->select('id')->get();
        for ($i = 0; $i < 100; $i++) {
            $gid = random_int(0, 1000);
            $game = new \App\Game([
                'team1_pts' => random_int(50, 150),
                'team2_pts' => random_int(50, 150),
                'referee_id' => $referees[random_int(1,count($referees)-1)]->id,
                'performance_id' => $performances[random_int(1,count($performances)-1)]->id,
            ]);

            try {
                $game->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
