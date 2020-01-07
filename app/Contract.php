<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * Get the Team the Contract belongs to.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    /**
     * Get the Player the Contract belongs to.
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
