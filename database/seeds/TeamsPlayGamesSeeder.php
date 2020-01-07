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
        $teams = DB::table('teams')->select('id')->get();
        $games = DB::table('games')->select('id')->get();
        for ($i = 0; $i < 100; $i++) {
            $teamsplaygames = new \App\TeamsPlayGames([
                'team1_id' => $teams[random_int(1,count($teams)-1)]->id,
                'team2_id' => $teams[random_int(1,count($teams)-1)]->id,
                'game_id' => $games[random_int(1,count($games)-1)]->id,
            ]);

            try {
                $teamsplaygames->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
