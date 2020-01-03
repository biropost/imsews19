<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // bezeichnung, homecourt, headcoach, gruendungsjahr


    /**
     * Get the Players of the Team.
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Get the Performance records associated with the Team.
     */
    public function performance()
    {
        return $this->hasMany(TeamPerformance::class);
    }
}
