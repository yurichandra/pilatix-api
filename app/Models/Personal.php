<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Personal extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'address',
    ];

    /**
     * Define relation with user model.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
