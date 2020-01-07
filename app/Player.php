<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'position', 'height', 'weight', 'number'
        // team_id
    ];
    /**
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at', 'deleted_at'
    ];
    /**
     * Get the Team the Player belongs to.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }
}
