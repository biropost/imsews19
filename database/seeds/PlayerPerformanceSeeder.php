<?php

use Illuminate\Database\Seeder;

class PlayerPerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $playerCount = \App\Player::all()->count();

        for ($i = 10; $i < 1500; $i++) {
            $pp = new \App\PlayerPerformance([
                'pts' => random_int(0, 80),
                'reb' => random_int(0, 30),
                'ast' => random_int(0, 30),
                'blocks' => random_int(0, 20),
                'tos' => random_int(0, 20),
                'fga' => random_int(0, 40),
                'fgm' => random_int(0, 40),
                'player_id' => random_int(1, $playerCount-1),
            ]);

            try {
                $pp->save();
            } catch (\Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
