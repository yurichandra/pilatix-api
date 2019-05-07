<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'stadium_id',
        'date',
    ];

    /**
     * Define relation with Club model as homeTeam.
     *
     * @return void
     */
    public function homeTeam()
    {
        return $this->belongsTo(Club::class, 'home_team_id');
    }

    /**
     * Define relation with Club model as awayTeam.
     *
     * @return void
     */
    public function awayTeam()
    {
        return $this->belongsTo(Club::class, 'away_team_id');
    }

    /**
     * Define relation with Stadium model.
     *
     * @return void
     */
    public function stadium()
    {
        return $this->belongsTo(Stadium::class);
    }
}
