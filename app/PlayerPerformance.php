<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerPerformance extends Model
{
    /**
     * Get the Player that this Performance belongs to.
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
