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
}
