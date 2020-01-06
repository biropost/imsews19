<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContractSeeder extends Seeder
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
        $players = DB::table('players')->select('id')->get();
        foreach ($teams as $team) {
            for ($i = 0; $i < 50; $i++) {
                $contract = new \App\Contract([
                    'salary' => random_int(18000, 22000),
                    'type' => "Max-Contract",
                    'number' => random_int(0, 99),
                    'team_id' => $team->id,
                    'player_id' => $players.at(random_int(0,count($players)))->id,
                ]);
                try {
                    $contract->save();
                } catch (Illuminate\Database\QueryException $e) {
                    continue;
                }
            }
        }
    }
}
