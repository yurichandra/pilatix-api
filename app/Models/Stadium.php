<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $fillable = [
        'city_id',
        'club_id',
        'name',
        'capacity',
    ];

    protected $casts = [
        'capacity' => 'double',
    ];

    protected $table = 'stadiums';

    /**
     * Define relation with City model.
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Define relation with Club model.
     *
     * @return void
     */
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    /**
     * Define relation with Match model.
     *
     * @return void
     */
    public function matches()
    {
        return $this->hasMany(Match::class);
    }
}
