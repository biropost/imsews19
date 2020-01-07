<?php

use Illuminate\Database\Seeder;

class TeamsPlayGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $gamesPlayed = 100;
        $teams = DB::table('teams')->select('id')->get();
        $games = DB::table('games')->select('id')->get();
        for ($i = 0; $i < $gamesPlayed; $i++) {
            $pid = random_int(0, 1000);
            $played = new \App\TeamsPlayGames([
                'id' => $pid,
                'team1_id' => $teams[random_int(0,count($teams)-1)]->id,
                'team2_id' => $teams[random_int(0,count($teams)-1)]->id,
                'game_id' => $games[random_int(0,count($games)-1)]->id,
            ]);

            try {
                $played->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
