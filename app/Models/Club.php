<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'country_id',
        'name',
    ];

    /**
     * Define relation with Country model.
     *
     * @return void
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Define relation with Stadium model.
     *
     * @return void
     */
    public function stadium()
    {
        return $this->hasOne(Stadium::class);
    }

    /**
     * Define relation with Match model by homeMatches.
     *
     * @return void
     */
    public function homeMatches()
    {
        return $this->hasMany(Match::class, 'home_team_id');
    }

    /**
     * Define relation with Match model by awayMatches.
     *
     * @return void
     */
    public function awayMatches()
    {
        return $this->hasMany(Match::class, 'away_team_id');
    }
}
