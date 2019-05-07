<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'match_id',
        'category_id',
        'type_id',
    ];

    /**
     * Define relation with Match model.
     *
     * @return void
     */
    public function match()
    {
        return $this->belongsTo(Match::class);
    }
}
