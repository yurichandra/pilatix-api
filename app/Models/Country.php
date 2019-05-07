<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    /**
     * Define relation with City model.
     *
     * @return void
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Define relation with Club model.
     *
     * @return void
     */
    public function clubs()
    {
        return $this->hasMany(Club::class);
    }
}
