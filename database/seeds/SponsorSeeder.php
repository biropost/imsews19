<?php

use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $sponsors = 100;

        for ($i = 0; $i < $sponsors; $i++) {
            $sid = random_int(0, 1000);
            $sponsor = new \App\Sponsor([
                'id' => $sid,
                'name' => sprintf('sponsor-%s', $sid),
                'founding_year' => random_int(1970, 2000),
            ]);

            try {
                $sponsor->save();
            } catch (Illuminate\Database\QueryException $e) {
                continue;
            }
        }
    }
}
