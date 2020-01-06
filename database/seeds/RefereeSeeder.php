<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RefereeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $firstNames = [
            'Mehmet',
            'Muhammed',
            'Rosin',
            'Frank',
            'Tobias',
            'Lothar',
            'Patrick',
            'Markus',
            'Christian',
            'Günther',
            'Serhat',
            'Mustafa',
            'Rahmi',
            'Jürgen',
            'Sven',
            'Baris',
            'Tamara',
            'Viktoria',
            'Julia',
            'Sandra',
            'Elisabetz',
            'Lukas',
            'Burak',
            'Emre',
            'Marko',
            'Grace',
            'Kendrick',
            'Snoop',
            'Wouter',
            'Kluas',
            'Lorenz',
            'Raphael',
            'Wolfgang',
            'Ayse',
            'Eda',
            'Linda',
            'Berfin',
            'Chris',
            'Hannes',
            'Fabian',
            'Kobe',
            'Derrick',
            'Kawhi',
            'Demar',
        ];
        $lastNames = [
            'Brückler',
            'Göksen',
            'Iscen',
            'Akinci',
            'Herzer',
            'Mayer',
            'Doppelmayr',
            'Blum',
            'Hofer',
            'Spar',
            'Rohner',
            'Berchthold',
            'Hämmerle',
            'Kresser',
            'Bernal',
            'Mahmood',
            'Ross',
            'Benedikt',
            'Baljak',
            'Prvulovic',
            'Andic',
            'Krstic',
            'Pilicic',
            'Gans',
            'Brugger',
            'Lamar',
            'Dogg',
            'Rijkaard',
            'Buffon',
            'Mulsera',
            'Hurn',
            'Mars',
            'Ayodeji',
            'Schmölzer',
            'Fend',
            'Zumtobel',
            'Reiter',
            'Sentürk',
            'Aktas',
            'Yilmaz',
            'Bryant',
            'Rose',
            'Leonard',
            'Derozan',
        ];
        $firstNamesCount = count($firstNames);
        $lastNamesCount = count($lastNames);
        $teams = DB::table('teams')->select('id')->get();
        foreach ($teams as $team) {
            for ($i = 0; $i < 50; $i++) {
                $referee = new \App\Referee([
                    'first_name' => $firstNames[random_int(0, $firstNamesCount-1)],
                    'last_name' => $lastNames[random_int(0, $lastNamesCount-1)],
                    'salary' => random_int(50000, 80000),
                ]);
                try {
                    $referee->save();
                } catch (Illuminate\Database\QueryException $e) {
                    continue;
                }
            }
        }
    }
}
