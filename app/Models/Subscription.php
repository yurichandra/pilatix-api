<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'club_id',
        'start_date',
    ];

    /**
     * Define relation with User model.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
}
