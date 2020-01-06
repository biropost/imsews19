<?php

use Illuminate\Database\Seeder;

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
        $games = 100;
        $referees = DB::table('referees')->select('id')->get();
        for ($i = 0; $i < $games; $i++) {
            $gid = random_int(0, 1000);
            $game = new \App\Game([
                'id' => $gid,
                'team1_pts' => random_int(50, 150),
                'founding_year' => random_int(50,150),
                'referee_id' => $referees.at(random_int(0,count($referees)))->id,
            ]);

            try {
                $game->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
