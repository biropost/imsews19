<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamPerformance extends Model
{
    /**
     * Get the Team this Performance belongs to.
     */
    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
