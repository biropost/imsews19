<?

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamsPlayGames extends Model
{
    public function team()
    {
        return $this->hasMany(Team::class);
    }

}
